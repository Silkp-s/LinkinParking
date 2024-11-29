@extends('layouts.app')
@section('title','clienteEditar')
@section('content')
<div class="container">
    <h1>Editar Cine</h1>

    <!-- Formulario para editar -->
    <form action="{{ route('update.cines', $cine->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Pais</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais', $cine->pais) }}" required>
        </div>

        <div class="form-group">
            <label for="mail">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad', $cine->ciudad) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Cine</button>
        <a href="{{ route('index.cines') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection