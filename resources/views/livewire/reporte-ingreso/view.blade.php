@section('title', __('Ingresos'))
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
         <h2 class="text-center"><b>Reporte Ingresos</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
      <select wire:model="filtro_mes"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione una mes </option>
               @foreach($meses as $num=>$mes)
                  <option value="{{$num}}"> {{$mes}} </option>
               @endforeach
         </select>
      </div>
      <div class="col">
      <select wire:model="filtro_gen"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione un Genero</option>
               @foreach($generos as $id=>$genero)
                  <option value="{{$id}}"> {{$genero}} </option>
               @endforeach
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="getPelIncome({{$filtro_mes}}, {{$filtro_gen}})" class="btn btn-danger">Generar</button>
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
         <h3>Ingresos mensuales  <i class="ion ion-ios-people pr-3"></i><i class="ion ion-ios-film"></i></h3>
      </div>
   </div>
<div class="row">
@if($list_pel)
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col" class="text-center"># Alquileres Pelicula</th>
            <th scope="col" class="text-center">Nombre Película</th>
            <th scope="col" class="text-center">Precio</th>
            <th scope="col" class="text-center">Ingreso Generado</th>
         </tr>
      </thead>
     <tbody>
           @foreach($list_pel as $row)
               <tr>
                  <td class="text-center">{{$row['num_alq']}}</td>
                  <td class="text-center">{{$row['pel_nombre']}}</td>
                  <td class="text-center">{{number_format($row['pel_precio'],2,'.',',')}}$</td>
                  <td class="text-center text-success"><b>{{number_format($row['total'],2,'.',',')}}$</b></td>
               </tr>
           @endforeach
     </tbody>
   </table>
@endif
</div>

</div>