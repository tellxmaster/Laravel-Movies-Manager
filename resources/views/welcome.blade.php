@extends('layouts.app')
@section('title', __('Bienvenido'))
@section('content')
<div class="container-fluid p-4">
        <h3 class="text-center mb-4">Listado de Peliculas</h3>
        <div class="container" style="gap: 20px 10px; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
            @guest
                @foreach($peliculas as $pelicula)
                    <div class="card">
                        <img class="card-img-top w-200 h-75 overflow-hidden" src="{{$pelicula->imagen}}" alt="pel_imagen" >
                        <div class="card-body">
                            <h5 class="card-title">{{$pelicula->pel_nombre}}</h5>
                            <p class="card-text text-success"><b>{{$pelicula->pel_costo}}$</b></p>
                            <h5><span class="badge badge-info">{{$pelicula->genero->gen_nombre}}</span></h5>
                        </div>
                    </div>
                @endforeach
                </div>
			@else
				Hola {{ Auth::user()->name }}, Bienvenido de nuevo a {{ config('app.name', 'Laravel') }}.    
            @endif	
</div>
@endsection