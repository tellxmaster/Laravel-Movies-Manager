<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        $num_alquileres = Alquiler::all()->count();
        $num_peliculas = Pelicula::all()->count();
		$num_usuarios = User::all()->count();
		$num_generos = Genero::all()->count();
        return view('admin.index',[
            'num_alquileres'=>$num_alquileres,
            'num_peliculas'=>$num_peliculas,
			'num_usuarios'=>$num_usuarios,
			'num_generos'=>$num_generos,
        ]);
    }
}
