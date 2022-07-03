@section('title', __('Socios'))
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
         <h2 class="text-center"><b>Reporte Socios</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
      <select wire:model="anio"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione una Opcion </option>
               <?php 
                    $year = date("Y");
                     for ($i= 2000; $i < $year+1 ; $i++) { 

                     echo'<option>'.$i.'</option>';
                         }

                    ?>
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="getSocio({{$anio}})" class="btn btn-danger">Generar</button>
            <a class="btn btn-warning" onclick="getSoc()" wire.model="ss">Texto</a>  
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
         <h3>Socios  <i class="ion ion-ios-people pr-3"></i><i class="ion ion-ios-film"></i></h3>
      </div>
   </div>
<div class="row">
   @if($spm)
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col" class="text-center">Mes</th>
            <th scope="col" class="text-center">Numero Socios</th>
            <th scope="col" class="text-center">Nombre socio top</th>
         </tr>
      </thead>
     <tbody>
     @foreach($meses as $num=>$nombre)
     <tr>
        <td class="text-center">{{$nombre}}</td>
        <td>{{$spm[$loop->iteration-1]}}</td>
        <td>{{$apm[$loop->iteration-1]}}</td>
     </tr>
     @endforeach
     </tbody>
   </table>
   
   @endif
</div>

</div>

<div class="position-relative mb-4">
    <canvas class="chart" id="line-chart-users" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>

@section('js')
<script>
   
    function getSoc() {   
      console.log({{$ss['data']}});
   }
</script>

@stop



