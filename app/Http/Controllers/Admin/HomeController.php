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
        // $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Noviembre'];
        // $user_data = [];
        // for($i=1 ; $i<10 ; $i++){
        //    $user_data['label'] = $meses[$i];
        //    $user_data['data'] = User::all()->whereBetween('created_at', ['2022-'.$i.'-01', '2022-'.$i.'-31'])->count();
        //}
        // dd($user_data);
        // $user_data['data'] = json_encode($user_data); 
        
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
            
        ],$data);
    }
}
