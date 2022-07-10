@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <!-- Tarjeta Peliculas Agregadas -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner d-flex">
                        <div class="col">
                            <div class="row">
                                <h3> {{ $stats['num_pel_mes'] }} </h3>
                                <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
                            </div>
                        </div>
                        <div class="col">
                            <h4><small> <b>Total:</b> {{ $stats['num_pel'] }}</small></h4>
                        </div>
                    </div>
                    <p class="pl-3">Peliculas agregadas </p>
                    <div class="icon">
                        <i class="ion ion-ios-videocam"></i>
                    </div>
                    <a href="/pelicula" class="small-box-footer">Más información <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Fin Tarjeta Peliculas Agregadas -->

            <!-- Tarjeta Número Alquiler Mes -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner d-flex">
                        <div class="col">
                            <div class="row">
                                <h3> {{ $stats['num_alq_mes'] }} </h3>
                                <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
                            </div>
                        </div>
                        <div class="col">
                            <h4><small> <b>Total:</b> {{ $stats['num_alq'] }}</small></h4>
                        </div>
                    </div>
                    <p class="pl-3">Nuevos alquileres </p>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/alquiler" class="small-box-footer">Más información <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Fin Tarjeta Número Alquiler Mes -->

            <!-- Tarjeta Número Socios Mes -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner d-flex">
                        <div class="col">
                            <div class="row">
                                <h3> {{ $stats['num_soc_mes'] }} </h3>
                                <small style="padding-top: 1.2rem; padding-left: 0.5em;"> mes </small>
                            </div>
                        </div>
                        <div class="col">
                            <h4><small> <b>Total:</b> {{ $stats['num_soc'] }}</small></h4>
                        </div>
                    </div>
                    <p class="pl-3">Socios Nuevos</p>
                    <div class="icon">
                        <i class="ion ion-android-person-add"></i>
                    </div>
                    <a href="/socio" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Fin Tarjeta Número Socios Mes -->

            <!-- Tarjeta Ingresos -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $stats['ingresos_mes'] }} $</h3>
                        <p>Ingreso mes actual</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="/genero" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Fin Tarjeta Ingresos -->
        </div>

        <!-- Gráficas Estadisticas -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Generos Disponibles en el inventario -->
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Géneros disponibles en el Inventario</h3>
                            <a href="/reporte-genero" class="btn btn-danger">Generar Reporte</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">{{ $stats['num_pel'] }}</span>
                                <span>Total de peliculas en el inventario</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="text-muted"></span>
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <canvas id="categoryChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Fin Generos Disponibles en el inventario -->
                <!-- 3 Ultimos alquileres realizados -->
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
                                @foreach ($lrents as $row)
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
            </div>
            <!-- Fin 3 Ultimos alquileres realizados -->

            <!-- Gráfica Socios Registrados -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Socios Registrados</h3>
                            <a href="/reporte-socio" class="btn btn-danger">Generar Reporte</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">{{ $stats['num_soc'] }}</span>
                                <span>Total socios registrados</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> {{ $stats['tasa_crecimiento_soc'] }}%
                                </span>
                                <span class="text-muted">Respecto al Mes</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas class="chart" id="membersChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>

                    </div>
                </div>
                <!-- Fin Gráfica Socios Registrados -->

                <!-- Pelicula más alquilada -->
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Top Pelicula más Alquiladas</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body d-flex">
                        <div class="col-9">
                            <h2>{{ $top_pelicula['nombre'] }}</h2>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <p><b>Veces Alquiladas: </b>{{ $top_pelicula['num_alq'] }}</p>
                                    <p><b>Estreno: </b>{{ $top_pelicula['fecha_est'] }}</p>
                                </div>
                                <div class="col">
                                    <p><b>Ingresos Generados</b></p>
                                    <p class="text-success"><b>${{ $top_pelicula['ingresos'] }} <i
                                                class="ion ion-ios-paper text-success"></i></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ $top_pelicula['imagen'] }}" alt="pelicula_top" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIn Pelicula más alquilada -->

            <!-- Gráfica peliculas alquiladas por mes -->
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
                                <span class="text-bold text-lg">{{ $stats['num_alq'] }}</span>
                                <span>Total Alquileres</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> {{ $stats['tasa_crecimiento_alq'] }}%
                                </span>
                                <span class="text-muted">Respecto al Mes</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="alquileres-chart" style="height: 300px;"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Fin Gráfica peliculas alquiladas por mes -->

            <!-- Tabla tiempo restante alquileres  -->
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
                                @foreach ($rest_time as $row)
                                    <tr>
                                        <td>{{ $row->soc_nombre }}</td>
                                        <td>{{ $row->pel_nombre }}</td>
                                        <td class="text-center">
                                            @if ($row->Days <= 0)
                                                <span class="badge badge-danger"><i class="fas fa-skull"></i>{{ $row->Days }} </span>
                                            @elseif ($row->Days > 0 && $row->Days < 5)
                                                <span class="badge badge-warning">{{ $row->Days }} días <i class="ion ion-android-warning"></i></span>
                                            @elseif ($row->Days>5 && $row->Days<30)
                                                <span class="badge badge-success"> {{ $row->Days }} días <i class="ion ion-checkmark-circled"></i></span>
                                            @endif
                                        </td>
                                    <tr>                                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-secondary">
                        <!--$rest_time->links() -->
                        <p class="text-light text-center mt-3"><b>Alquileres Cercanos a la entrega</b></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Tabla tiempo restante alquileres  -->
    <!-- Fin Dashboard  -->
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
        // ---------------------- Géneros disponibles en el Inventario --------------------------
        const category = JSON.parse(`<?php echo $data; ?>`);
        const categoryChartCanvas = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(categoryChartCanvas, {
            type: 'bar',
            data: {
                labels: category.label,
                datasets: [{
                    data: category.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
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
                            stepSize: 1.15,
                            fontColor: '#000000'
                        },
                        gridLines: {
                            display: true,
                            color: '#000000',
                            drawBorder: false
                        }
                    }]
                },
                legend: {
                    display: false
                },
            }
        });

        // ------------------- Fin Géneros disponibles en el Inventario --------------------------

        // ---------------------------- Gráfica Socios por mes -----------------------------------
        const membersChartCanvas = document.getElementById('membersChart').getContext('2d')
        const membersChart = new Chart(membersChartCanvas, { 
            type: 'line',
            data: {
              labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
              datasets: [{
                  label: 'Socios',
                  fill: false,
                  borderWidth: 2,
                  lineTension: 0.4,
                  spanGaps: true,
                  borderColor: '#F30067',
                  pointRadius: 2,
                  pointHoverRadius: 3,
                  pointColor: '#d60000',
                  pointBackgroundColor: '#d60000',
                  data: {{ $spm['data'] }}
              }]
            },
            options: {
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
        })
        // ------------------------ Fin Gráfica Socios por mes -----------------------------------

        // ---------------------------- Gráfica Alquileres por mes -----------------------------------
        const alq_chart = document.getElementById('alquileres-chart').getContext('2d');
        const alquilerChart = new Chart(alq_chart, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
                datasets: [{
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
                    data: {{ $apm['data'] }}
                }]
            },
            options: {
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
                            stepSize: 2,
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
        });
        // ---------------------------- Fin Gráfica Alquileres por mes -------------------------------
    </script>
@stop
