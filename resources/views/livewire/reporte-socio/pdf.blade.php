
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
   <title>PDF</title>
</head>

<body style="background-color: white;">
   <div class="container">
      <div style="display: flex;">
         <div class="col">
            <img class="logo" src="vendor/adminlte/dist/img/logo-small.png" width="75px" heigh="75px">
         </div>
         <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte Socios por mes</b></span>
         <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
         <span class="d-block mt-4 mb-2" style="font-size: 22px;"><b>Socios por mes</b> - <small>{{$anio}}</small></span>
      </div>
      
      <div class="row">
        @if($spm)
            <div class="col">
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
            </div>
            <script>
                let valores = {{Js::from($spm)}};
                //console.log(valores[0]);
                
                function done(){
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
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
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
                        bezierCurve : false,
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
      </div>
   </div>

   <footer style="position: fixed; bottom: 0;">
            <span class="text-center m-2">Derechos Reservados © Cineflix 2022.</span>
   </footer>
</body>
</html>
