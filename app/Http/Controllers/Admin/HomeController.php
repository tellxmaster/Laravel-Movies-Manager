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

        /** Obteniene generos más alquilados */
        $generos = Genero::all();
        $data = [];
        foreach( $generos as $genero){
            $data['label'][] = $genero->gen_nombre;
            $data['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }
        $data['data'] = json_encode($data);

        /** Obtiene los registros de usuarios por mes */
        

        /** Retorna los datos a la vista */
        return view('admin.index', $data,[
            'num_alquileres'=>$num_alquileres,
            'num_peliculas'=>$num_peliculas,
			'num_usuarios'=>$num_usuarios,
			'num_generos'=>$num_generos,
        ]);
    }
}
