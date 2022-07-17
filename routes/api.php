<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/peliculaslist', [App\Http\Controllers\Admin\HomeController::class,'getpel']);
Route::get('/peliculasalquiler', [App\Http\Controllers\Admin\HomeController::class,'get_alquiler']);
Route::get('/peliculasgenero', [App\Http\Controllers\Admin\HomeController::class,'get_pel_genero']);
Route::get('/peliculasingreso', [App\Http\Controllers\Admin\HomeController::class,'get_pel_ingreso']);
Route::get('/sociosyear', [App\Http\Controllers\Admin\HomeController::class,'get_soc_per_year']);
