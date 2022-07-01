<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Top 5 Generos</h1>
    @if($lista)
   <table class="table table-bordered">
      <thead>
         <tr class="bg-danger">
            <th scope="col">Nº</th>
            <th scope="col">Nombre Película</th>
            <th scope="col">Número alquileres</th>
         </tr>
      </thead>
      <tbody>
	  		@foreach($lista as $gen_nombre=>$numeros)
				<tr>
					<td>{{ $loop->iteration }}</td> 
					<td>{{ $gen_nombre }}</td>
					<td>{{ $numeros }}</td>
				</tr>
			@endforeach
      </tbody>
   </table>
   @endif
</body>
</html>