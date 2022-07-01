

<body>
   <style>
      body{
         font-family: 'Helvetica', 'Arial', sans-serif;
      }
   </style>
   <div style="display: flex;">
      <div>
         <img class="logo" src="vendor/adminlte/dist/img/logo-small.png" width="100px" heigh="100px">
      </div>
      <div>
         <h3>Cineflix</h3>
      </div>
   </div>
    <p style="float: right;"><b>Fecha de Emisión: </b>{{now()}}</p>
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
					<td>{{ $gen_nombre }} </td>
					<td>{{ $numeros }}</td>
				</tr>
			@endforeach
      </tbody>
   </table>
   @endif
   
</body>
</html>

