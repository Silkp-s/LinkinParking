@extends('layouts\app')

@section('content')
<h1>Editar Lugar</h1>
<form action="{{ route('lugars.update', $lugar->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Lugar Matriz:</label>
    <input type="text" name="lugar_matriz" value="{{ $lugar->lugar_matriz }}" required>
    <label>Posición X:</label>
    <input type="number" name="posx" value="{{ $lugar->posx }}" required>
    <label>Posición Y:</label>
    <input type="number" name="posy" value="{{ $lugar->posy }}" required>
    <label>Vehículo:</label>
    <select name="id_vehiculo" required>
        @foreach ($vehiculos as $vehiculo)
        <option value="{{ $vehiculo->id }}" {{ $lugar->id_vehiculo == $vehiculo->id ? 'selected' : '' }}>
            {{ $vehiculo->patente }}
        </option>
        @endforeach
    </select>
    <label>Valor:</label>
    <select name="id_valors">
        <option value="">Sin valor</option>
        @foreach ($valores as $valor)
        <option value="{{ $valor->id }}" {{ $lugar->id_valors == $valor->id ? 'selected' : '' }}>
            {{ $valor->nombre }}
        </option>
        @endforeach
    </select>
    <label>Ocupado:</label>
    <select name="ocupado" required>
        <option value="1" {{ $lugar->ocupado ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ !$lugar->ocupado ? 'selected' : '' }}>No</option>
    </select>
    <button type="submit">Actualizar</button>
</form>
@endsection
