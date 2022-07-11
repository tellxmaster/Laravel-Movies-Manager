@extends('layouts.app')
@section('title', __('Bienvenido'))
@section('content')
<div class="container-fluid p-4">
        <h3 class="text-center mb-4">Listado de Peliculas</h3>
        <div class="container" style="gap: 20px 10px; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
            @foreach($peliculas as $pelicula)
                <div class="card w-200">
                    <img class="card-img-top overflow-hidden" style="max-height: 400px; min-height: 400px; overflow: hidden;" src="{{$pelicula->imagen}}" alt="pel_imagen" >
                    <div class="card-body">
                        <h5 class="card-title">{{$pelicula->pel_nombre}}</h5>
                        <div class="row mb-3 mt-3">
                            <div class="col">
                                <h5 class="card-text text-success"><b>{{$pelicula->pel_costo}}$</b></h5>
                            </div>
                            <div class="col">
                                <h5><span class="badge badge-warning float-right">{{$pelicula->genero->gen_nombre}}</span></h5>
                            </div>
                        </div>
                        @guest
                            
                        @else
                            <a href="/alquiler" class="btn btn-danger w-100">Alquilar</a>
                        @endif	
                    </div>
                </div>
            @endforeach

        </div>
</div>
@endsection