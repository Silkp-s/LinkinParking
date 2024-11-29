@extends('layouts.app')
@section('title','clienteCrear')
@section('content')
@section('content')
<div class="container">
    <h1>Detalles del Cine</h1>
    <ul>
        <li><strong>ID:</strong> {{ $cine->id }}</li>
        <li><strong>Ciudad:</strong> {{ $cine->ciudad }}</li>
        <li><strong>Pais:</strong> {{ $cine->pais }}</li>
    </ul>
    <a href="{{ route('index.cines') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
@endsection