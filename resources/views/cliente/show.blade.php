@extends('layouts.app')
@section('title','clienteCrear')

@section('content')


<div class="container">
    <h1>Detalles del Cliente</h1>
    <ul>
        <li><strong>ID:</strong> {{ $cliente->id }}</li>
        <li><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
        <li><strong>RUT:</strong> {{ $cliente->rut }}</li>
    </ul>
    <a href="{{ route('index.cliente') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection