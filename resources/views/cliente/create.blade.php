@extends('layouts.app')
@section('title','clienteCrear')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Nuevo Cliente</h1>

    <form action="{{ route('store.cliente') }}" method="POST" class="bg-dark p-4 rounded shadow">
        @csrf

        <div class="form-group mb-3">
            <label for="nombre" class="form-label text-light">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control custom-input" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="rut" class="form-label text-light">RUT</label>
            <input type="text" name="rut" id="rut" class="form-control custom-input" value="{{ old('rut') }}" required>
        </div>

        
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-custom">Crear Cliente</button>
            <a href="{{ route('index.cliente') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection