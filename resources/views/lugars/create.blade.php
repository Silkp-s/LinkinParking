@extends('layouts\app')

@section('content')
<h1>Crear Lugar</h1>
<form action="{{ route('lugars.create') }}" method="POST">
    @csrf
    <label>Lugar Matriz:</label>
    <input type="text" name="lugar_matriz" required>
    <label>Posición X:</label>
    <input type="number" name="posx" required>
    <label>Posición Y:</label>
    <input type="number" name="posy" required>
    <label>Vehículo:</label>
    <select name="id_vehiculo" required>
        @foreach ($vehiculos as $vehiculo)
        <option value="{{ $vehiculo->id }}">{{ $vehiculo->patente }}</option>
        @endforeach
    </select>
    <label>Valor:</label>
    <select name="id_valors">
        <option value="">Sin valor</option>
        @foreach ($valores as $valor)
        <option value="{{ $valor->id }}">{{ $valor->nombre }}</option>
        @endforeach
    </select>
    <label>Ocupado:</label>
    <select name="ocupado" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>
    <button type="submit">Guardar</button>
</form>
@endsection
