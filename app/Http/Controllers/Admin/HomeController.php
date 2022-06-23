<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Peliculas;
use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        /** Obteniene statCount */
        $num_alquileres = Alquiler::all()->count();
        $num_peliculas = Pelicula::all()->count();
		$num_usuarios = User::all()->count();
		$num_generos = Genero::all()->count();
        $alquileres = Alquiler::all();
        $num_inicial = 6;
        $tasa_crecimiento=round((($num_peliculas-$num_inicial)/$num_inicial)*100);
        $alquilers = Alquiler::select('soc_id','pel_id','alq_valor','created_at')->orderBy('created_at')->take(3)->get();

        /** Obteniene generos más alquilados */
        $generos = Genero::all();
        $data = [];
        foreach( $generos as $genero){
            $data['label'][] = $genero->gen_nombre;
            //$data['data'][] = Alquiler::all()->where('pel_id', ($pel = optional(Pelicula::where('gen_id',$genero->id)->first()->id)) ? $pel : 0)->count();
            $data['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }
        $data['data'] = json_encode($data);

        /** Obtiene los registros de usuarios por mes */
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Noviembre'];
        $enero = User::all()->whereBetween('created_at', ['2022-01-01', '2022-01-31'])->count();
        $febrero = User::all()->whereBetween('created_at', ['2022-02-01', '2022-02-28'])->count();
        $marzo = User::all()->whereBetween('created_at', ['2022-03-01', '2022-03-31'])->count();
        $abril = User::all()->whereBetween('created_at', ['2022-04-01', '2022-04-30'])->count();
        $mayo = User::all()->whereBetween('created_at', ['2022-05-01', '2022-05-31'])->count();
        $junio = User::all()->whereBetween('created_at', ['2022-06-01', '2022-06-30'])->count();
        $julio = User::all()->whereBetween('created_at', ['2022-07-01', '2022-07-31'])->count();
        $agosto = User::all()->whereBetween('created_at', ['2022-08-01', '2022-08-31'])->count();
        $septiembre = User::all()->whereBetween('created_at', ['2022-09-01', '2022-09-30'])->count();
        $octubre = User::all()->whereBetween('created_at', ['2022-10-01', '2022-10-31'])->count();
        $noviembre = User::all()->whereBetween('created_at', ['2022-11-01', '2022-11-30'])->count();
            
        /** Pelicula más vista */
    
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
            'num_alq'=>$mayor['num_alq']
        ];
        
        
        
        
        

        /** Retorna los datos a la vista */
        return view('admin.index',[
            'num_alquileres'=>$num_alquileres,
            'num_peliculas'=>$num_peliculas,
			'num_usuarios'=>$num_usuarios,
			'num_generos'=>$num_generos,
            'tasa_crecimiento'=>$tasa_crecimiento,
            'alquilers'=>$alquilers,
            'generos'=>$generos,
            'top_pelicula'=>$top_pelicula,
            'enero'=>$enero,
            'febrero'=>$febrero,
            'marzo'=>$marzo,
            'abril'=>$abril,
            'mayo'=>$mayo,
            'junio'=>$junio,
            'julio'=>$julio,
            'agosto'=>$agosto,
            'septiembre'=>$septiembre,
            'octubre'=>$octubre,
            'noviembre'=>$noviembre,

        ],$data);
    }
}
