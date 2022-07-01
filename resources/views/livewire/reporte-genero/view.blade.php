@section('title', __('Géneros'))
<div class="container-fluid p-5">
   <div class="row">
      <div class="col">
         <img class="logo" src="vendor/adminlte/dist/img/logo-small.png" width="100px" heigh="100px">
      </div>
      <div class="col">
         <img class="logo" style="float: right;" src="vendor/adminlte/dist/img/cineflix-logo.png" width="200px" heigh="200px">
      </div>
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h2 class="text-center"><b>Reporte Géneros</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
      <select wire:model="genero"  name="genero" id="select" class="form-control">
               <option value="1">-- Seleccione una Opcion </option>
                @foreach($generos as $id=>$nombre)        
				   <option value="{{$id}}">{{$nombre}}</option>
                @endforeach
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="filterByGender({{$genero}})" class="btn btn-danger">Generar</button>
      </div>
      <div class="col">
         <a href="/reporte-top/pdf" class="btn btn-success"  style="float: right;">
            <span><b>Descargar</b></span>
            <i class="ion-ios-cloud-download p-1"></i>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h3>Películas por género <i class="ion ion-social-dropbox pr-2"></i><i class="ion ion-ios-film"></i></h3>
      </div>
   </div>
<div class="row">
@if($list_generos)
  <table class="table table-bordered">
  <thead>
         <tr class="bg-danger">
            <th scope="col">Nº</th>
            <th scope="col">Nombre Película</th>
            <th scope="col">Fecha de estreno</th>
         </tr>
    </thead>
    <tbody>
         @for($i = 0 ; $i < count($list_generos) ; $i++)
            <tr>
               <td>{{$list_generos[$i]['id']}}</td>
               <td>{{$list_generos[$i]['nombre']}}</td>
               <td>{{$list_generos[$i]['fecha_est']}}</td>
            </tr>
         @endfor
         <tr class="table-secondary">
            <td colspan="3" class="text-center"><b>Ingresos totales: <span class="text-success ml-1">{{number_format($sum_gen,2,'.',',')}}$</span></b>  </td>
         </tr>
    </tbody>
  </table>
@endif
</div>

</div>
