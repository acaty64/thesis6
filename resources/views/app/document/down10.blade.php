@extends('layouts.app')

@section('content')
{{-- Sequence_id: {{ $data['sequence_id'] }} --}}
{{-- <a type="hidden" name='thesis_id' value="{{ $data['thesis']['id'] }}"></a>
<a type="hidden" name='deal_id' value="{{ $data['deal']['id'] }}"></a>
<a type="hidden" name='author_id' value="{{ $data['author_id'] }}"></a>
 --}}
<table class="table table-striped">
	<tr>
			<h2>{{ $data['deal']['name'] }}</h2>
	</tr>
	<tr>
		<td><b>Título: </b></td>
		<td>{{ $data['title']['title'] }}</td>
		
	</tr>
</table>
<br>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Historial</th>
			<th>Descripción</th>
			<th>Fecha</th>
			<th>Documento</th>
			<th>Acción</th>
		</tr>	
	</thead>
	<tbody>
	@foreach($data['traces'] as $item)
		<tr>
			<td>Id: {{ $item['id'] }}</td>
			<td>{{ $item['deal']['name'] }}</td>
			<td>{{ $item['date'] }}</td>
			<td>{{ $item['document'] }}</td>
			<td>
				@if($item['document'] != '')
					<a href="{{ route('document.down10', [ $item['id'], $data['deal']['id'], $data['sequence_id'] ])}}"><button>Descargar</button></a>
				@endif
			</td>		
		</tr>	
	@endforeach
	</tbody>
</table>

{{-- Deal: {{ $data['deal'] }}
<br>
Thesis: {{ $data['thesis'] }}
<br>
Author_id: {{ $data['author_id'] }}
<br>
Traces: {{ $data['traces'] }}
<br>
Title: {{ $data['title'] }}
<br> --}}
@endsection

@section('js')

@endsection

@section('view','app/document/down10.blade.php')

