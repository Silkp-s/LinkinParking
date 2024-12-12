@extends('layouts\app')

@section('content')
<h1>Crear Estacionamiento</h1>
<form action="{{ route('estacionamientos.store') }}" method="POST">
    @csrf
    <label>Lugar Matriz:</label>
    <input type="text" name="lugar_matriz" required>
    <label>Lugar:</label>
    <select name="id_lugar" required>
        @foreach ($lugares as $lugar)
        <option value="{{ $lugar->id }}">{{ $lugar->lugar_matriz }}</option>
        @endforeach
    </select>
    <button type="submit">Guardar</button>
</form>
@endsection
