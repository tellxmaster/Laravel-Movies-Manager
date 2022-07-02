
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <title>Document</title>
</head>

<body>
   <div class="container">
   <div style="display: flex;">
      
   </div>
    
    <div>
      <table class="table table-bordered">
         <thead>
            <tr class="bg-danger">
               <th scope="col">Nº</th>
               <th scope="col">Nombre Genero</th>
               <th scope="col">Número alquileres</th>
            </tr>
         </thead>
         <tbody>
            @foreach($lista as $gen_nombre=>$numeros)
               <tr>
                  <td>{{ $loop->iteration }}</td> 
                  <td>{{ $gen_nombre }} </td>
                  <td>{{ $numeros }}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   </div>
</body>
</html>
