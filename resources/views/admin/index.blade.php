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
        <div class="inner">
          <h3> {{$num_peliculas}} </h3>

          <p>Peliculas Agregadas</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-videocam"></i>
        </div>
        <a href="/pelicula" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3> {{$num_alquileres}} </h3>
          <p>Peliculas Alquiladas</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3> {{$num_usuarios}} </h3>
          <p>Usuarios Nuevos</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$num_generos}}</h3>
          <p>Generos Agregados</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-box"></i>
        </div>
        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- GRAFICAS -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Generos más alquilados</h3>
            <a href="javascript:void(0);" class="btn btn-danger">Generar Reporte</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{$num_peliculas}}</span>
              <span>Total de peliculas en el inventario</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> {{$tasa_crecimiento}}%
              </span>
              <span class="text-muted">Desde la semana pasada</span>
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
							@foreach($alquilers as $row)
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
            <h3 class="card-title">Usuarios Registrados</h3>
            <a href="javascript:void(0);" class="btn btn-danger">Generar Reporte</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">{{$num_usuarios}}</span>
              <span>Total usuarios registrados</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1%
              </span>
              <span class="text-muted">Respecto al Mes</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
             <!--<canvas id="sales-chart" height="200"></canvas>-->
             <!-- <canvas id="lineChart" height="200"></canvas>-->
             <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Online Store Overview</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <p class="text-success text-xl">
              <i class="ion ion-ios-refresh-empty"></i>
            </p>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="ion ion-android-arrow-up text-success"></i> 12%
              </span>
              <span class="text-muted"> </span>
            </p>
          </div>
          <!-- /.d-flex -->
          <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <p class="text-warning text-xl">
              <i class="ion ion-arrow-up-a"></i>
            </p>
            <span><b><h4>PELICULA TOP</b></h4></span>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="ion ion-android-arrow-up text-warning"></i> {{$top_pelicula['num_alq']}}
              </span>

              <span class="text-muted">{{ $top_pelicula['nombre'] }}</span>
            </p>
          </div>
          <!-- /.d-flex -->
          <div class="d-flex justify-content-between align-items-center mb-0">
            <p class="text-danger text-xl">
              <i class="ion ion-ios-people-outline"></i>
            </p>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="ion ion-android-arrow-down text-danger"></i> 1%
              </span>
              <span class="text-muted">REGISTRATION RATE</span>
            </p>
          </div>
          <!-- /.d-flex -->
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
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
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
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

  /** USER CHART */
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
    datasets: [
      {
        label: 'Usuarios',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#d60000',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#d60000',
        pointBackgroundColor: '#d60000',
        data: [{{$enero}},{{$febrero}},{{$marzo}},{{$abril}},{{$mayo}},{{$junio}},{{$julio}},{{$agosto}},{{$septiembre}},{{$octubre}}]
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
          stepSize: 10,
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

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })

  /** GRAFICA USUARIOS */

  
</script>



@stop