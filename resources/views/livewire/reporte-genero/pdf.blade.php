
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
         <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte Peliculas por generos</b></span>
         <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
         <span class="d-block mt-4 mb-2" style="font-size: 22px;"><b>Peliculas del Genero</b> - <small>{{$genero_lbl}}</small></span>
      </div>
      
      <div>
      @if($lista)
      <table class="table table-bordered mt-2 mb-2">
        <thead>
                <tr class="bg-danger">
                    <th scope="col">Nº</th>
                    <th scope="col">Nombre Película</th>
                    <th scope="col">Fecha de estreno</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0 ; $i < count($lista) ; $i++)
                    <tr>
                    <td>{{$lista[$i]['id']}}</td>
                    <td>{{$lista[$i]['nombre']}}</td>
                    <td>{{$lista[$i]['fecha_est']}}</td>
                    </tr>
                @endfor
                <tr class="table-secondary">
                    <td colspan="3" class="text-center"><b>Ingresos totales: <span class="text-success ml-1">{{number_format($total_ing,2,'.',',')}}$</span></b>  </td>
                </tr>
            </tbody>
        </table>
        @endif
      </div>
   </div>
   <footer style="position: fixed; bottom: 0;">
            <span class="text-center m-2">Derechos Reservados © Cineflix 2022.</span>
   </footer>
</body>
</html>
