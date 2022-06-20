@section('title', __('Alquilers'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-dollar-sign text-danger"></i>
							Listado Alquileres </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Alquileres">
						</div>
						<div class="btn btn-sm btn-danger" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Alquileres
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.alquilers.create')
						@include('livewire.alquilers.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Socio</th>
								<th>Pelicula</th>
								<th>Alquilado Desde</th>
								<th>Alquilado Hasta</th>
								<th>Valor</th>
								<th>Fecha Entrega</th>
								<td>Opciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($alquilers as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->socio->soc_nombre }}</td>
								<td>{{ $row->pelicula->pel_nombre }}</td>
								<td>{{ $row->alq_fecha_desde }}</td>
								<td>{{ $row->alq_fecha_hasta }}</td>
								<td>{{ $row->alq_valor }}</td>
								<td>{{ $row->alq_fecha_entrega }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirma Eliminar Alquiler id {{$row->id}}? \nUna vez eliminado el Alquiler no se puede recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $alquilers->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
