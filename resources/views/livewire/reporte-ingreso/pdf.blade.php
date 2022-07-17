
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
         <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte Ingresos por Género</b></span>
         <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
         <span class="d-block mt-4 mb-2" style="font-size: 22px;"><b>Ingresos de pelicula en {{$mes}} de {{$gen}}</b></span>
      </div>
      
      <div>
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
   </div>
   <footer style="position: fixed; bottom: 0;">
            <span class="text-center m-2">Derechos Reservados © Cineflix 2022.</span>
   </footer>
</body>
</html>
