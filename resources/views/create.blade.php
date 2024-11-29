@extends('layouts.app')
@section('title','clienteCrear')
@section('content')
<div class="container">
    <h1>Crear Nuevo Cine</h1>
    <form action="{{ route('store.cines') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ciudad">ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}" required>
        </div>
        <div class="form-group">
            <label for="text">Pais</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais') }}" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Crear Cine</button>
        <a href="{{ route('index.cines') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection