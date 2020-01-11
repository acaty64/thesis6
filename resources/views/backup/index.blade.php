@extends('layouts.app')
@section('title','Backup')

@section('content')
  <h1 class="text-center">Backup & Restore</h1>
  <div class="container">
		<p style="text-align:center;">
		    <button type="submit" style="float:none;">
		    	<a href="{{ route('backup.create') }}">
		    		Crear backup
		    	</a>
		    </button>
		</p>
    <table style="width:50%" align="center">
      {{ csrf_field() }}
      <thead>
    		<tr style="border-style: solid;">
    			<th>Archivo</th>
    			<th>Tamaño</th>
    			<th>Modificado</th>
    			<th>Acción</th>
    		</tr>
      </thead>
      <tbody>
        @foreach($data as $fila)
        <tr style="border-style: solid;">
          <td>{{ $fila['nombre'] }}</td>
          <td>{{ $fila['tamaño'] }}</td>
          <td>{{ $fila['modificado'] }}</td>
          <td>
            <a href="{{ route('backup.destroy', [$fila['nombre']]) }}" class="btn btn-danger" data-toggle="tooltip"><span class="glyphicon glyphicon-remove" aria-hidden='true'></span></a>
            <a href="{{ route('backup.download', [$fila['nombre']]) }}" class="btn btn-success" data-toggle="tooltip"><span class="glyphicon glyphicon-download-alt" aria-hidden='true'></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('js')

@endsection

@section('view','backup/index.blade.php')
