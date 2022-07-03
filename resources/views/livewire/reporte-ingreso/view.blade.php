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
      <select wire:model="opcion"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione una Opcion </option>
            
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="" class="btn btn-danger">Generar</button>
      </div>
      <div class="col">
      <select wire:model="opcion"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione una Opcion </option>
            
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="" class="btn btn-danger">Generar</button>
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
    
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col" class="text-center">Numero Pelicula</th>
            <th scope="col" class="text-center">Nombre Película</th>
            <th scope="col" class="text-center">Precio</th>
            <th scope="col" class="text-center">Total</th>
         </tr>
      </thead>
     <tbody>
    
     </tbody>
   </table>

</div>

</div>