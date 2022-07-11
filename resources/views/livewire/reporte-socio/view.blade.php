@section('title', __('Socios'))
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
            <h2 class="text-center"><b>Reporte Socios</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <select wire:model="anio" name="opcion" id="select" class="form-control" wire:click="restData()">
                <option value="1">-- Seleccione una Opcion </option>
                <?php
                $year = date('Y');
                for ($i = 2000; $i < $year + 1; $i++) {
                    echo '<option>' . $i . '</option>';
                }
                
                ?>
            </select>
        </div>
        <div class="col">
            <button wire:click.prevent="getSocio({{ $anio }})" class="btn btn-danger"
                wire:click="renderData()">Generar</button>
        </div>
        <div class="col">
            <a href="{{ route('descargarPDF-Soc', ['anio' => $anio]) }}" target="_blank" class="btn btn-success"
                style="float: right;">
                <span>Exportar</span>
                <i class="ion-ios-upload-outline p-1"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4 mb-4">
            <h3>Socios <i class="ion ion-ios-people pr-3"></i><i class="ion ion-ios-film"></i></h3>
        </div>
    </div>
    <div class="row">
        @if ($spm)
            <div class="col-6">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-danger">
                            <th scope="col" class="text-center">Mes</th>
                            <th scope="col" class="text-center">Numero Socios</th>
                            <th scope="col" class="text-center">Nombre socio top</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meses as $num => $nombre)
                            <tr>
                                <td class="text-center">{{ $nombre }}</td>
                                <td>{{ $spm[$loop->iteration - 1] }}</td>
                                <td>{{ $apm[$loop->iteration - 1] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($num_busq == 0)
                <div class="col-6" wire:ignore>
                    <p style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; min-width: 100%;">Procesando...</p>
                </div>
            @else
                <div class="col-6" wire:ignore>
                    <canvas id="myChart"
                        style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; min-width: 100%;"></canvas>
                </div>
                <script>
                    let valores = {{ Js::from($spm) }};

                    function done() {
                        let image = myChart.toBase64Image('image/png', 1);
                        console.log(image);
                        let para = document.createElement("p");
                        para.innerHTML = `<img id='base64image' src="${image}" />`
                        document.getElementById("image-chart").appendChild(para);
                    }

                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                                'Octubre', 'Noviembre', 'Diciembre'
                            ],
                            datasets: [{
                                label: 'Socios',
                                data: valores,
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
                            responsive: true,
                            bezierCurve: false,
                            animation: {
                                onComplete: done
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            @endif
        @endif
    </div>

</div>

<div class="position-relative mb-4">
    <canvas class="chart" id="line-chart-users"
        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>

@section('js')
    <script></script>
@stop
