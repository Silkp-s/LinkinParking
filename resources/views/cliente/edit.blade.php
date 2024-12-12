@extends('layouts.app')
@section('title','clienteCrear')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('update.cliente', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="mail">rut</label>
            <input type="text" name="rut" id="rut" class="form-control" value="{{ old('rut', $cliente->rut) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('index.cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection