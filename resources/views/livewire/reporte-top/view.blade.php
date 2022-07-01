@section('title', __('TopGeneros'))
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
         <select wire:model="opcion"  name="opcion" id="select" class="form-control">
               <option value="1">-- Seleccione una Opcion </option>
            @foreach($meses as $num=>$nombre)
				   <option value="{{$num}}">{{$nombre}}</option>
			   @endforeach
         </select>
      </div>
      <div class="col">
            <button wire:click.prevent="getTopFive({{$opcion}})" class="btn btn-danger">Generar</button>
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
         <h3>Top 5 Géneros <i class="ion ion-stats-bars"></i> <small><i class="ion ion-ios-film"></i></small></h3>
      </div>
   </div>
<div class="row">
   @if($top_generos)
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col">Nº</th>
            <th scope="col">Nombre Película</th>
            <th scope="col">Número alquileres</th>
         </tr>
      </thead>
      <tbody>
	  		@foreach($top_generos as $gen_nombre=>$numeros)
				<tr>
					<td>{{ $loop->iteration }}</td> 
					<td>{{ $gen_nombre }} @if($loop->iteration == 1 && $numeros!=0) <i class="ion ion-trophy float-right h4" style="color: gold; font-size: 16px;"></i> @elseif($loop->iteration == 2 && $numeros!=0) <i class="ion ion-trophy float-right" style="color: silver; font-size: 16px;"></i>  @elseif($loop->iteration == 3 && $numeros!=0) <i class="ion ion-trophy float-right" style="color: #B87333; font-size: 16px;"></i> @endif</td>
					<td>{{ $numeros }}</td>
				</tr>
			@endforeach
      </tbody>
   </table>
   @endif
</div>

</div>
