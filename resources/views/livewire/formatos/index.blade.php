@extends('adminlte::page')

@section('title', 'Formato')

@section('content_header')
    <h1>Formatos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('formatos')
        </div>     
    </div>   
</div>
@endsection