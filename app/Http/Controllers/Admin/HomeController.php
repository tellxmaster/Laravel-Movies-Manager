<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\User;
use App\Models\Socio;
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
        ];
        
        //$alquiler = Alquiler::select(array('id','soc_id','pel_id','alq_fecha_desde','alq_fecha_hasta', DB::raw("DATEDIFF(alq_fecha_desde,alq_fecha_hasta)AS Days")));
        
        /** Retorna los datos a la vista */
        $lrents = $this->getLastRents(); //Ultimas Rentas
        $stats = $this->getStats();     //Numero Estadisticas
        $data = $this->getAllGender();
        $spm = $this->getSocByDate();
        $apm = $this->getAlqByDate();
        $rest_time = $this->getRestingTime();
        //dd($stats);
       // dd($rest_time);
        //dd($rest_time[1]->pel_id);
        return view('admin.index',[
            'stats'=>$stats,
            'lrents'=>$lrents,
            'top_pelicula'=>$top_pelicula,
            'spm'=>$spm,
            'apm'=>$apm,
            'rest_time'=>$rest_time
        ],$data);
    }

    /** Obteniene numero de peliculas alquileres y otros datos */
    public function getStats()
    {
        $mes = date('m');
        $mes_anterior = date('m', strtotime('-1 month'));
        $valor_final_soc = Socio::all()->whereBetween('created_at',['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
        $valor_final_alq = Alquiler::all()->whereBetween('created_at',['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count();
        $valor_inicial_soc = Socio::all()->whereBetween('created_at',['2022-'.$mes_anterior.'-01', '2022-'.$mes_anterior.'-31'])->count();
        $valor_inicial_alq = Alquiler::all()->whereBetween('created_at',['2022-'.$mes_anterior.'-01', '2022-'.$mes_anterior.'-31'])->count();
        //dd('Alquiler Final:'.$valor_final_alq, 'Alquiler Inicial: '.$valor_inicial_alq, 'Final Socio: '.$valor_final_soc, 'Inicial Socio: '.$valor_inicial_soc);
       
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
            array_push($alquiler_per_month, (Alquiler::all()->whereBetween('created_at', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count()));
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

    public function getRestingTime(){
       // $al = DB::table('alquiler')->select('id','pel_id',DB::raw("DATEDIFF(alq_fecha_hasta,alq_fecha_desde)AS Days"))->get();
        //$al = DB::table('alquiler')->join('socio','alquiler.soc_id','=','socio.id')->join('pelicula','alquiler.pel_id','=','pelicula.id')->select('socio.soc_nombre','pelicula.pel_nombre','alquiler.created_at',DB::raw("DATEDIFF(alq_fecha_hasta,alq_fecha_desde)AS Days"))->orderBy('Days','asc')->get();
        $resting_time = DB::table('alquiler')->join('socio','alquiler.soc_id','=','socio.id')->join('pelicula','alquiler.pel_id','=','pelicula.id')->select('socio.soc_nombre','pelicula.pel_nombre','alquiler.created_at',DB::raw("DATEDIFF(NOW(),alq_fecha_hasta)AS Days"))->orderBy('Days','asc')->paginate(6);
        //$resting_time['data'] = json_encode($al);
        //return $resting_time['data'];
        return $resting_time;
    }
}
