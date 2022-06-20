@extends('adminlte::page')

@section('title', 'Peliculas')

@section('content_header')
    <h1>Peliculas</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('peliculas')
        </div>     
    </div>   
</div>
@endsection

@section('js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#createDataModal').modal('hide');
        });
        $(document).ready( function () {
            $('#actores').DataTable();
        } );
    </script>
@endsection