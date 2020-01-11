@extends('layouts.app')
@section('title','Tesis')

@section('content')
  <h1 class="text-center">Mantenimiento de Datos de Tesis</h1>
	<div class="container">
		<p style="text-align:center;">
              <a href="{{ route('thesis.create') }}" class="btn btn-success" data-toggle="tooltip">Crear Nuevo Registro</a>
		</p>
		<table class="table-striped" align="center">
			{{ csrf_field() }}
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Correlativo</th>
					<th scope="col">Solicitud</th>
					<th scope="col">Autor</th>
					<th scope="col">Titulo</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $item)
				<tr>
					<td>{{ $item->id }}</td>
					<td>{{ $item->serie }}</td>
					<td>{{ $item->application }}</td>
					<td>{{ $item->author }}</td>
					<td>{{ $item->title }}</td>
					<td>
						<a href="{{ route('thesis.show', $item->id) }}" class="btn btn-success" data-toggle="tooltip" title="Ver" ><span class="glyphicon glyphicon-eye-open" aria-hidden='true'></span></a>
						<a href="{{ route('thesis.destroy', $item->id) }}" class="btn btn-danger" data-toggle="tooltip" title="Eliminar" ><span class="glyphicon glyphicon-remove" aria-hidden='true'></span></a>
						<a href="{{ route('thesis.edit', $item->id) }}" class="btn btn-success" data-toggle="tooltip" title="Editar Datos" ><span class="glyphicon glyphicon-pencil" aria-hidden='true'></span></a>
						<a href="{{ route('thesis.email', $item->id) }}" class="btn btn-success" data-toggle="tooltip" title="Envio de Correo" ><span class="glyphicon glyphicon-send" aria-hidden='true'></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-3">
					{{ $data->links() }}
				</div>
			</div>			
		</div>
	</div>
@endsection

@section('view','app/thesis/index.blade.php')