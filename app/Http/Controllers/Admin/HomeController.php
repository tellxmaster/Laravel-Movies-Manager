<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\User;
use App\Models\Socio;
use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    public function index(){
    
        $mayor = [
            'id'=>1,
            'num_alq'=>Alquiler::all()->where('pel_id',1)->count()
        ];
        for($i = 1 ; $i < Pelicula::all()->count(); $i++){
            $peltop = collect([
                'id'=>$i,
                'num_alq'=>Alquiler::all()->where('pel_id',$i)->count()
            ]);
            if($peltop['num_alq'] > $mayor['num_alq']){
                $mayor = $peltop;
                //$id_mayor = Alquiler::select('id','alq_valor')->where('pel_id',$i)->get();
            }
        }
        $top_pelicula=[
            'nombre'=>(Pelicula::select('pel_nombre')->where('id',$mayor['id'])->first()->pel_nombre),
            'num_alq'=>$mayor['num_alq'],
            'fecha_est'=>(Pelicula::select('pel_fecha_estreno')->where('id',$mayor['id'])->first()->pel_fecha_estreno),
            'ingresos'=> DB::table('alquiler')->where('pel_id', $mayor['id'])->sum('alq_valor'),
            'imagen'=>(Pelicula::select('imagen')->where('id',$mayor['id'])->first()->imagen),
        ];
        
        //$alquiler = Alquiler::select(array('id','soc_id','pel_id','alq_fecha_desde','alq_fecha_hasta', DB::raw("DATEDIFF(alq_fecha_desde,alq_fecha_hasta)AS Days")));
        
        /** Retorna los datos a la vista */
        $lrents = $this->getLastRents(); //Ultimas Rentas
        $stats = $this->getStats();     //Numero Estadisticas
        $data = $this->getAllGender();
        $spm = $this->getSocByDate();
        $apm = $this->getAlqByDate();

        return view('admin.index',[
            'stats'=>$stats,
            'lrents'=>$lrents,
            'top_pelicula'=>$top_pelicula,
            'spm'=>$spm,
            'apm'=>$apm
        ],$data);
    }

    public function welcome(){
        $peliculas = Pelicula::all();
        return view('welcome',compact('peliculas'));
    }

    /** Obteniene numero de peliculas alquileres y otros datos */
    public function getStats()
    {
        $mes = date('m');
        $mes_anterior = date('m', strtotime('-1 month'));
        $valor_final_soc = Socio::all()->whereBetween('created_at',['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
        $valor_final_alq = Alquiler::all()->whereBetween('alq_fecha_desde',['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
        $valor_inicial_soc = Socio::all()->whereBetween('created_at',['2022-'.$mes_anterior.'-01', '2022-'.$mes_anterior.'-31'])->count();
        $valor_inicial_alq = Alquiler::all()->whereBetween('alq_fecha_desde',['2022-'.$mes_anterior.'-01', '2022-'.$mes_anterior.'-31'])->count();
        //dd('Alquiler Final:'.$valor_final_alq, 'Alquiler Inicial: '.$valor_inicial_alq, 'Final Socio: '.$valor_final_soc, 'Inicial Socio: '.$valor_inicial_soc, 'fechas: 2022-'.$mes_anterior.'-01', '2022-'.$mes_anterior.'-31');
       
       $stats = [
        'num_alq_mes'           =>  $valor_final_alq,
        'num_soc_mes'           =>  $valor_final_soc,
        'num_pel_mes'           =>  Pelicula::all()->whereBetween('created_at', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count(),
        'num_alq'               =>  Alquiler::all()->count(),
        'num_pel'               =>  Pelicula::all()->count(),
		'num_soc'               =>  Socio::all()->count(),
        'ingresos_mes'          =>  DB::table('alquiler')->whereBetween('created_at', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->sum('alq_valor'),
        'alquileres'            =>  $this->getLastRents(),
        'tasa_crecimiento_soc'  =>  round((($valor_final_soc-$valor_inicial_soc)/$valor_inicial_soc)*100,2),
        'tasa_crecimiento_alq'  =>  round((($valor_final_alq-$valor_inicial_alq)/$valor_inicial_alq)*100,2)
       ];
       return $stats;
    }

    public function getLastRents(){
        return Alquiler::select('soc_id','pel_id','alq_valor','created_at')->orderBy('created_at')->take(3)->get();
    }


    public function getSocByDate(){
        $meses = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $socios_per_month = [];
        $spm = [];
        $sumSocios = 0;
        foreach($meses as $mes){
            $sumSocios += Socio::all()->whereBetween('created_at', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
            array_push($socios_per_month, $sumSocios);
        }
        $spm['data'] = json_encode($socios_per_month);
        return $spm;
    }

    public function getAlqByDate(){
        $meses = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $alquiler_per_month = [];
        $apm = [];
        foreach($meses as $mes){
            array_push($alquiler_per_month, (Alquiler::all()->whereBetween('alq_fecha_desde', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count()));
        }
        $apm['data'] = json_encode($alquiler_per_month);
        return $apm;
    }

    public function getAllGender(){
        /** Obteniene generos más alquilados */
        $generos = Genero::all();
        $data = [];
        foreach( $generos as $genero){
            $data['label'][] = $genero->gen_nombre;
            //$data['data'][] = Alquiler::all()->where('pel_id', ($pel = optional(Pelicula::where('gen_id',$genero->id)->first()->id)) ? $pel : 0)->count();
            $data['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }
        $data['data'] = json_encode($data);
        return $data;
    }

    public function getpel(Request $request){
        //dd($request->input('mes'));
        //$peliculas = Pelicula::all();
        //return $peliculas;
        $mes = $request->input('mes');
        $generos = Genero::all();
        $top = [];
       
        foreach($generos as $genero){
            $top[$genero->gen_nombre] = (DB::table('pelicula')->select('pelicula.id','pel_nombre','gen_id','alquiler.alq_fecha_desde')->join('alquiler','alquiler.pel_id','pelicula.id')->where('gen_id',$genero->id)->whereBetween('alquiler.alq_fecha_desde', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count());
        }
        arsort($top);
        while(count($top)>5){
            array_pop($top);
        }
        return $top;
    }

    public function get_alquiler(Request $request){
        $fecha = $request->input('fecha');
        $peliculas = Pelicula::all();
        $peliculas_nombres = [];
        $listado = [];
        $total_ing = 0;
        foreach($peliculas as $pelicula){
            $ingresos_pel = Alquiler::all()->where('pel_id',$pelicula->id)->where('alq_fecha_desde',$fecha)->sum('alq_valor');
            $total_ing = $total_ing + $ingresos_pel;
            array_push($listado,
            [
                'num_alq' => Alquiler::all()->where('pel_id',$pelicula->id)->where('alq_fecha_desde',$fecha)->count(),
                'pel_nombre' => $pelicula->pel_nombre,
                'gen_nombre' => $pelicula->genero->gen_nombre,
                'ingresos' => $ingresos_pel
            ]);

        }
        return $listado;
    }

    public function get_pel_genero(Request $request){
        $genero = $request->input('genero');
        $peliculas = Pelicula::all();
        $listado_pel = [];
        $i=0;

        $pel = (DB::table('pelicula')->select('id','pel_nombre','pel_fecha_estreno','gen_id')->where('gen_id',$genero)->get())->map(function($pel){
               return ['id'=>$pel->id, 'nombre'=>$pel->pel_nombre,'fecha_est'=>$pel->pel_fecha_estreno];
        });

        $ids_pel = (Pelicula::select('id')->where('gen_id',$genero)->get()->toArray());
        $suma_tot = 0;
        for($i=0; $i<count($ids_pel); $i++){
            $suma_tot = $suma_tot + (Alquiler::all()->where('pel_id',$ids_pel[$i]['id'])->sum('alq_valor'));
        }

        $this->sum_gen = $suma_tot;
        $listado_pel = $this->list_generos = $pel->toArray();
        return $listado_pel;
    }

    public function get_pel_ingreso(Request $request){
        $genero = $request->gen;
        $mes = $request->mes;
        $peliculas = Pelicula::all()->where('gen_id', $genero);
        $list = [];
        foreach($peliculas as $pelicula)
        {
            //dd('2022-'.$mes.'-01');
            //$mes = date('m',$mes);
            $num_alq = Alquiler::all()->where('pel_id',($pelicula->id))->whereBetween('alq_fecha_desde', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
            $total = Alquiler::all()->where('pel_id',$pelicula->id)->whereBetween('alq_fecha_desde', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->sum('alq_valor');
            $item = collect(
                [
                    'num_alq'    => $num_alq,
                    'pel_nombre' => $pelicula->id,
                    'pel_nombre' => $pelicula->pel_nombre,
                    'pel_precio' => $pelicula->pel_costo,
                    'total'      => $total,
                ]
            );
            if($item['num_alq'] > 0){
                array_push($list, $item);
            }
            
        }
        //dd($list);
        
        $suma_tot = 0;
        for($i=0; $i<count($list); $i++){
            $suma_tot = $suma_tot + $list[$i]['total'];
        }

        return $list;
    
    }

    public function get_soc_per_year(Request $request)
    {   
        $anio = $request->input('anio');
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo',
                '06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ],
        );
        $socios_per_month = [];
        $spm = [];
        $sumSocios = 0;
        $apm=[];
        $socs = [];
        
        foreach($meses as $mes=>$label){
            $sumSocios = Socio::all()->whereBetween('created_at', [$anio.'-'.$mes.'-01', $anio.'-'.$mes.'-31'])->count();
            $topSoc = $this->getTopSocio($anio,$mes);
            array_push($socios_per_month, [
                'Mes' => $label,
                'Número socios' => $sumSocios,
                'Top Socio' => $topSoc
            ]);
            //$this->getTopSocio($anio,$mes);
            //array_push($apm,$this->getTopSocio($anio,$mes));
        }
        
        //$this->apm=$apm; 
        return $socios_per_month;

    }

    public function getTopSocio($anio,$mes)
    {
        $socios=Socio::all();
        $numSocio=[];

        foreach($socios as $socio)
        {
            $numSocio[$socio->id]=Alquiler::select('soc_id')->whereBetween('alq_fecha_desde', [$anio.'-'.$mes.'-01', $anio.'-'.$mes.'-31'])->where('soc_id',$socio->id)->count();
            //array_push($numSocio,$topSoc);
        }
        arsort($numSocio);
        //dd($numSocio);
        
        if($numSocio[array_key_first($numSocio)]==0)
        {
          $top_soc="-";
        }
        else{
            $top_soc=Socio::all()->where('id',array_key_first($numSocio))->first()->soc_nombre;
        }

       return $top_soc;
    }
}
