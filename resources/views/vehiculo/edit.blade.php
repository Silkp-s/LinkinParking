@extends('layouts.app')
@section('title','vehiculoEditar')

@section('content')
<div class="container">
    <h1>Editar Vehiculo</h1>

    <form action="{{ route('update.vehiculo', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Patente</label>
            <input type="text" class="form-control" id="patente" name="patente" value="{{ old('patente', $vehiculo->patente) }}">
            </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('index.vehiculo') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection