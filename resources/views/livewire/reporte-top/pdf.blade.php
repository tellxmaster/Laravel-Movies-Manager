
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

<body>
   <div class="container">
      <div style="display: flex;">
         <div class="col">
            <img class="logo" src="vendor/adminlte/dist/img/logo-small.png" width="75px" heigh="75px">
         </div>
         <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte Géneros</b></span>
         <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
         <span class="d-block mt-4 mb-2" style="font-size: 22px;"><b>Top 5 Géneros</b> - <small>{{$mes_lbl}}</small></span>
      </div>
      
      <div>
         <table class="table table-bordered mt-2 mb-2">
            <thead>
               <tr class="bg-danger">
                  <th scope="col" class="text-light">Nº</th>
                  <th scope="col" class="text-light">Nombre Genero</th>
                  <th scope="col" class="text-light">Número alquileres</th>
               </tr>
            </thead>
            <tbody>
               @foreach($lista as $gen_nombre=>$numeros)
                  <tr>
                     <td class="text-center">{{ $loop->iteration }}</td> 
                     <td class="text-center">{{ $gen_nombre }} </td>
                     <td class="text-center">{{ $numeros }}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   <footer style="position: fixed; bottom: 0;">
            <span class="text-center m-2">Derechos Reservados © Cineflix 2022.</span>
   </footer>
</body>
</html>
