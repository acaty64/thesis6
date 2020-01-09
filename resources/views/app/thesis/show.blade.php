@extends('layouts.app')

@section('content')
	@if(count($data)==0)
		No hay documentos por revisar
	@endif




	<table class="table table-striped" style="width:80%; border-style: solid;" align="center">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Id: </td>
				<td>{{ $data['thesis']['id'] }}</td>
			</tr>
			@foreach($data['titulos'] as $item)
			<tr>
				<td>Título: </td>
				<td>{{ $item['title'] }}</td>
			</tr>
			@endforeach
			<tr>
				<td>Autor: </td>
				<td>{{ $data['author'] }}</td>
			</tr>
			<tr>
				<td>Asesor: </td>
				<td>{{ $data['asesor'] }}</td>
			</tr>
			<tr>
				<td>Revisor: </td>
				<td>{{ $data['revisor'] }}</td>
			</tr>
			<tr>
				<td>Comite: </td>
				<td>{{ $data['comite'] }}</td>
			</tr>
		</tbody>
	</table>

{{-- 	<table class="table table-striped" style="width:80%; border-style: solid;" align="center">
		<thead>
			<tr>
				<th>Id</th>
				<th>Título</th>
				<th>Autor</th>
				<th>Tipo</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $item)
				<tr>
					<td>{{ $item['id'] }}</td>
					<td>{{ $item['title'] }}</td>
					<td>{{ $item['author'] }}</td>
					<td>{{ $item['tadvisor'] }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

 --}}


@endsection

@section('js')

@endsection

@section('view','app/thesis/advisor.blade.php')
