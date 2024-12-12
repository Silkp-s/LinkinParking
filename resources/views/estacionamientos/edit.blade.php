@extends('layout')

@section('content')
<h1>Editar Estacionamiento</h1>
<form action="{{ route('estacionamientos.update', $estacionamiento->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Lugar Matriz:</label>
    <input type="text" name="lugar_matriz" value="{{ $estacionamiento->lugar_matriz }}" required>
    <label>Lugar:</label>
    <select name="id_lugar" required>
        @foreach ($lugares as $lugar)
        <option value="{{ $lugar->id }}" {{ $estacionamiento->id_lugar == $lugar->id ? 'selected' : '' }}>
            {{ $lugar->lugar_matriz }}
        </option>
        @endforeach
    </select>
    <button type="submit">Actualizar</button>
</form>
@endsection
