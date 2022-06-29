@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Estadisticas de Cineflix</h1>
@stop

@section('plugins.Sweetalert2',true)

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner d-flex">
          <div class="col">
            <div class="row">
              <h3> {{$stats['num_pel_mes']}} </h3>
              <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
            </div>
          </div>
          <div class="col">
            <h4><small> <b>Total:</b> {{$stats['num_pel']}}</small></h4>
          </div>
        </div>
        <p class="pl-3">Peliculas agregadas </p>
        <div class="icon">
          <i class="ion ion-ios-videocam"></i>
        </div>
        <a href="/pelicula" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner d-flex">
          <div class="col">
            <div class="row">
              <h3> {{$stats['num_alq_mes']}} </h3>
              <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
            </div>
          </div>
          <div class="col">
            <h4><small> <b>Total:</b> {{$stats['num_alq']}}</small></h4>
          </div>
        </div>
        <p class="pl-3">Nuevos alquileres </p>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/alquiler" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner d-flex">
          <div class="col">
            <div class="row">
              <h3> {{$stats['num_soc_mes']}} </h3>
              <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
            </div>
          </div>
          <div class="col">
            <h4><small> <b>Total:</b> {{$stats['num_soc']}}</small></h4>
          </div>
        </div>
        <p class="pl-3">Socios Nuevos</p>
        <div class="icon">
          <i class="ion ion-android-person-add"></i>
        </div>
        <a href="/socio" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>


    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$stats['ingresos_mes']}} $</h3>
          <p>Ingreso mes actual</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="/genero" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- GRAFICAS -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Géneros disponibles en el Inventario</h3>
            <a href="javascript:void(0);" class="btn btn-danger">Generar Reporte</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{$stats['num_pel']}}</span>
              <span>Total de peliculas en el inventario</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i>
              </span>
              <span class="text-muted"></span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
            <canvas id="genderChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <!-- <canvas id="visitors-chart" height="200"></canvas>-->
          </div>

        </div>
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Ultimos Alquileres</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0">        
					<table class="table table-striped table-valign-middle">
						<thead class="thead">
							<tr> 
								<th>Socio</th>
								<th>Pelicula</th>
								<th>Valor</th>
								<th>Detalles</th>
							</tr>
						</thead>
						<tbody>
							@foreach($lrents as $row)
							<tr>
								<td>{{ $row->socio->soc_nombre }}</td>
								<td>{{ $row->pelicula->pel_nombre }}</td>
								<td>{{ $row->alq_valor }}</td>
								<td width="90" class="text-center">
                  <a href="/alquiler" class="text-gray"><i class="fas fa-eye"></i></a>
								</td>
							@endforeach
						</tbody>
					</table>						
				</div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Socios Registrados</h3>
            <a href="javascript:void(0);" class="btn btn-danger">Generar Reporte</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{$stats['num_soc']}}</span>
              <span>Total socios registrados</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> {{$stats['tasa_crecimiento_soc']}}%
              </span>
              <span class="text-muted">Respecto al Mes</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
             <!--<canvas id="sales-chart" height="200"></canvas>-->
             <!-- <canvas id="lineChart" height="200"></canvas>-->
             <canvas class="chart" id="line-chart-users" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>

        </div>
      </div>
      <!-- /.card -->
      

      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Top Peliculas Alquiladas</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div class="card-body d-flex" >
          <div class="col-9">
            <h2>{{$top_pelicula['nombre']}}</h2>
            <hr>
            <div class="row">
            <div class="col">
              <p><b>Veces Alquiladas: </b>{{$top_pelicula['num_alq']}}</p>
              <p><b>Estreno: </b>{{$top_pelicula['fecha_est']}}</p>
            </div>
            <div class="col">
              <p><b>Ingresos Generados</b></p>
              <p class="text-success"><b>${{$top_pelicula['ingresos']}} <i class="ion ion-ios-paper text-success"></i></b></p>
            </div>
            </div>
          </div>
          <div class="col-2">
            <img width="105px" class="rounded" src="/resources/images/generic-movie.webp" alt="">
          </div>         
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Alquileres de Peliculas</h3>
            <a href="javascript:void(0);" class="btn btn-danger">Generar Reporte</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{$stats['num_alq']}}</span>
              <span>Total Alquileres</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> {{$stats['tasa_crecimiento_alq']}}%
              </span>
              <span class="text-muted">Respecto al Mes</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
             <canvas id="alquileres-chart" style="height: 300px;"></canvas>
          </div>

        </div>
      </div>
      <!-- /.card -->
  </div>
<!-- Card Warming Alquileres-->
<div class="col-lg-6">
  <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Tiempo restante de alquileres</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div id="table_data" class="card-body table-responsive p-0">        
					<table class="table table-striped table-valign-middle">
						<thead class="thead">
							<tr> 
								<th>Socio</th>
								<th>Pelicula</th>
								<th class="text-center">Dias faltantes</th>
							</tr>
						</thead>
						<tbody>
							@foreach($rest_time as $row)
							<tr>
								<td>{{ $row->soc_nombre }}</td>
								<td>{{ $row->pel_nombre }}</td>
								<td class="text-center">
                @if ($row->Days<=0)
                  <span class="badge badge-danger">{{ $row->Days }} días  <i class="fas fa-skull"></i></span></td>
                @elseif ($row->Days>0 && $row->Days<5)
                  <span class="badge badge-warning">{{ $row->Days }} días <i class="ion ion-android-warning"></i></span></td>
                @else ($row->Days>5 && $row->Days<30)
                  <span class="badge badge-success">{{ $row->Days }} días <i class="ion ion-checkmark-circled"></i></span></td>
                  @endif
							@endforeach
						</tbody>
					</table>						
				</div>
        <div class="card-footer">
            {{ $rest_time->links() }}
        </div>
      </div>
      <!-- /.card -->
    </div>
    </div>
  <!-- /.row -->
</div>
@endsection

@section('css')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
<!-- admin_custom_css -->
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  window.livewire.on('closeModal', () => {
    $('#createDataModal').modal('hide');
  });
</script>

<script>
  const cData = JSON.parse(`<?php echo $data; ?>`);
  console.log(cData);
  const ctx = document.getElementById('genderChart').getContext('2d');
  const genderChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: cData.label,
      datasets: [{
        data: cData.data,
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      legend: {
        display: false
      },
    }
  });

  /** SER CHART */
  var salesGraphChartCanvas = $('#line-chart-users').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
    datasets: [
      {
        label: 'Socios',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#F30067',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#d60000',
        pointBackgroundColor: '#d60000',
        data: {{$spm['data']}} 
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#000000'
        },
        gridLines: {
          display: false,
          color: '#000000',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 4,
          fontColor: '#000000'
        },
        gridLines: {
          display: true,
          color: '#000000',
          drawBorder: false
        }
      }]
    }
  }


  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })


  /* GRAFICA ALQUILERS*/
  const alq_chart = document.getElementById('alquileres-chart').getContext('2d');

  var alquilerGraphChartData = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
    datasets: [
      {
        label: 'Alquileres',
        fill: true,
        fillColor: '#99C4C8',
        borderWidth: 2,
        lineTension: 0.3,
        spanGaps: true,
        borderColor: '#99C4C8',
        pointRadius: 4,
        pointHoverRadius: 7,
        pointColor: '#18978F',
        pointBackgroundColor: '#18978F',
        data: {{$apm['data']}} 
      }
    ]
  }

  var alquilerGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#000000'
        },
        gridLines: {
          display: false,
          color: '#000000',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 1,
          fontColor: '#000000'
        },
        gridLines: {
          display: true,
          color: '#000000',
          drawBorder: false
        },
        
      }]
    }
  }

  const alquilerChart = new Chart(alq_chart, {
    type: 'line',
    data: alquilerGraphChartData,
    options: alquilerGraphChartOptions
  });

  
</script>



@stop