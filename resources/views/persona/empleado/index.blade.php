@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empleados <a href="empleado/create"><button class="btn btn-success">Nuevo</button></a> <a href="{{url('reporteempleados')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></h3>
		@include('persona.empleado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>DNI</th>
					<th>Teléfono</th>
					<th>Domicilio</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->idpersona}}</td>
					<td>{{ $per->nombre_apellido}}</td>
					<td>{{ $per->dni}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->domicilio}}</td>
					<td>{{ $per->estado}}</td>
					<td>
						<a href="{{URL::action('EmpleadoController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('persona.empleado.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>
@push ('scripts')
<script>
$('#liVentas').addClass("treeview active");
$('#liClientes').addClass("active");
</script>
@endpush
@endsection