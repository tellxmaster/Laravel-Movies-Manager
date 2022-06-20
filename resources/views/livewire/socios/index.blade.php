@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    <h1>Socios</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('socios')
        </div>     
    </div>   
</div>
@endsection

@section('js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#createDataModal').modal('hide');
        });
    </script>
@endsection