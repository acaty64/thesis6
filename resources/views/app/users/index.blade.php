@extends('layouts.app')
@section('title','Usuarios')

@section('content')
<h1 class="text-center">Mantenimiento de Datos de Usuarios</h1>
<div class="container">
	<p style="text-align:center;">
		<a href="{{ route('users.create') }}" class="btn btn-success" data-toggle="tooltip">Crear Nuevo Usuario</a>
	</p>
	
	<table class="table-striped" align="center">
		{{ csrf_field() }}
		<tr>
			<th>Id</th>
			<th>Código</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Acción</th>
		</tr>

		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->userDetail->codigo }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->tuser }}</td>
			<td>
				<a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" data-toggle="tooltip" title="Eliminar" ><span class="glyphicon glyphicon-remove" aria-hidden='true'></span></a>
				<a href="{{ route('users.edit', $user->id) }}" class="btn btn-success" data-toggle="tooltip" title="Editar Datos" ><span class="glyphicon glyphicon-pencil" aria-hidden='true'></span></a>
			</td>
		</tr>
		@endforeach
	</table>
	<br>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3">
					{{ $users->links() }}
			</div>
		</div>
	</div>
</div>
@endsection

@section('view','app/users.blade.php')