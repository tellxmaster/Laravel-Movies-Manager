<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect('/', '/dashboard', 301);
Route::redirect('/home', '/dashboard', 301);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
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
    })->name('dashboard');
});

Auth::routes();


//Route Hooks - Do not delete//
	Route::view('pelicula', 'livewire.peliculas.index')->middleware('auth');
	Route::view('alquiler', 'livewire.alquilers.index')->middleware('auth');
	Route::view('socio', 'livewire.socios.index')->middleware('auth');
	Route::view('formato', 'livewire.formatos.index')->middleware('auth');
	Route::view('director', 'livewire.directors.index')->middleware('auth');
	Route::view('genero', 'livewire.generos.index')->middleware('auth');
	Route::view('actor_pelicula', 'livewire.actor-peliculas.index')->middleware('auth');
	Route::view('actor', 'livewire.actors.index')->middleware('auth');
	Route::view('sexo', 'livewire.sexos.index')->middleware('auth');
	Route::view('user','profile.show')->middleware('auth');


	/** Routes AdminLTE */
	
	Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
	Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
	Route::get('director', function(){
		return view('livewire.directors.index');
	})->name('Director');