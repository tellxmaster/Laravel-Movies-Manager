@section('title', __('TopAlquileres'))
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
         <h2 class="text-center"><b>Reporte Alquileres</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <input type="date" wire:model="fecha"  name="fecha" class="form-control">
      </div>
      <div class="col">
            <button wire:click.prevent="getAlquilers('{{$fecha}}')" class="btn btn-danger">Generar</button>
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
         <h3>Alquiler por dia  <i class="ion ion-card pr-2"></i><i class="ion ion-ios-film"></i></h3>
      </div>
   </div>
<div class="row">
  @if($listado)
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col" class="text-center">Nº alquileres</th>
            <th scope="col" class="text-center">Nombre de Película</th>
            <th scope="col" class="text-center">Géneros</th>
            <th scope="col" class="text-center">Ingresos</th>
         </tr>
      </thead>
     <tbody>
     @for($i = 0 ; $i<count($listado) ; $i++)
     @if($listado[$i]['num_alq']>0)
        <tr>
         <td class="text-center">{{ $listado[$i]['num_alq'] }}</td>
         <td class="text-center">{{ $listado[$i]['pel_nombre'] }}</td>
         <td class="text-center">{{ $listado[$i]['gen_nombre'] }}</td>
         <td class="text-center">{{ number_format($listado[$i]['ingresos'],2,'.',',') }} $</td>
        </tr>
   @endif
     @endfor
     <tr class="table-secondary">
            <td colspan="4" class="text-center"><b>Ingresos totales: <span class="text-success ml-1">{{number_format($total_ing,2,'.',',')}}$</span></b>  </td>
      </tr>
     </tbody>
   </table>
   @endif
</div>

</div>
