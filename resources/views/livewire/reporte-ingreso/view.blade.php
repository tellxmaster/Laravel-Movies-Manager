@section('title', __('Ingresos'))
<div class="container-fluid p-5">
    <div class="row">
        <div class="col">
            <img class="logo" src="vendor/adminlte/dist/img/logo-small.png" width="100px" heigh="100px">
        </div>
        <div class="col">
            <img class="logo" style="float: right;" src="vendor/adminlte/dist/img/cineflix-logo.png" width="200px"
                heigh="200px">
        </div>
    </div>
    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="text-center"><b>Reporte Ingresos</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <select wire:model="filtro_mes" name="opcion" id="select" class="form-control" wire:click="restData()">
                <option value="1">-- Seleccione una mes </option>
                @foreach ($meses as $num => $mes)
                    <option value="{{ $num }}"> {{ $mes }} </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wire:model="filtro_gen" name="opcion" id="select" class="form-control" wire:click="restData()">
                <option value="1">-- Seleccione un Genero</option>
                @foreach ($generos as $id => $genero)
                    <option value="{{ $id }}"> {{ $genero }} </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button wire:click.prevent="getPelIncome({{ $filtro_mes }}, {{ $filtro_gen }})" wire:click="renderData()"
                class="btn btn-danger @if (!$filtro_mes || !$filtro_gen) disabled @endif">Generar</button>
        </div>
        <div class="col">
            <a href="{{ route('descargarPDF-Ing',['gen' => $filtro_gen, 'mes' => $filtro_mes])}}" target="_blank"  class="btn btn-success"  style="float: right;">
                <span>Exportar</span>
                <i class="ion-ios-upload-outline p-1"></i>
             </a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4 mb-4">
            <h3>Ingresos mensuales <i class="ion ion-ios-people pr-3"></i><i class="ion ion-ios-film"></i></h3>
        </div>
    </div>
    <div class="row">
        @if ($list_pel)
        <div class="col-6">
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
                    @foreach ($list_pel as $row)
                        <tr>
                            <td class="text-center">{{ $row['num_alq'] }}</td>
                            <td class="text-center">{{ $row['pel_nombre'] }}</td>
                            <td class="text-center">{{ number_format($row['pel_precio'], 2, '.', ',') }}$</td>
                            <td class="text-center text-success"><b>{{ number_format($row['total'], 2, '.', ',') }}$</b>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-secondary">
                     <td colspan="4" class="text-center"><b>Ingresos totales: <span class="text-success ml-1">{{number_format($ing_total,2,'.',',')}}$</span></b>  </td>
                  </tr>
                </tbody>
            </table>
         </div>
            @if($num_busq == 0)
                <div class="col-6">
                    <p style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; min-width: 100%;">Procesando...</p>
                </div>
            @else
               <div class="col-6" wire:ignore>
                  <canvas id="myChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; min-width: 100%;"></canvas>
               </div>
               <script>
                  let porcentajes = [];
                  porcentajes = {{Js::from($porcentajes)}};
                  let porcentajes_lbl = [];
                  porcentajes_lbl = {{Js::from($porcentajes_lbl)}};
                  console.log(porcentajes);
                  var pieChartCanvas = document.getElementById('myChart').getContext('2d');
                  new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: {
                       labels: porcentajes_lbl,
                       datasets: [
                       {
                           data: porcentajes,
                           backgroundColor : ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a'],
                       }
                       ]
                    },
                    options: {
                       maintainAspectRatio : false,
                       responsive : true,
                    }
                  })
               </script>
               @endif   
          </div>

        @elseif($resultFound == false && $num_busq > 0)
            <p class="ml-4 text-danger"><i class="ion ion-android-alert"></i> No se encontraron alquileres en esta
                fecha.</p>
        @endif

    </div>
</div>
