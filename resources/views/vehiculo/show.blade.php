@extends('layouts.app')
@section('title','')

@section('content')
<div class="container">
    <h1>Detalles del Vehiculo</h1>
    <ul>
        <li><strong>ID:</strong> {{ $vehiculo->id }}</li>
        <li><strong>Nombre:</strong> {{ $vehiculo->patente }}</li>
        <li><strong>ID Cliente:</strong>
            @if ($vehiculo->cliente)
                {{ $vehiculo->cliente->id }}
            @endif
        </li>
        <li><strong>Nombre Cliente:</strong>
            @if ($vehiculo->cliente)
                {{ $vehiculo->cliente->nombre }}
            @endif
        </li>
        <li><strong>RUT:</strong>
            @if ($vehiculo->cliente)
                {{ $vehiculo->cliente->rut }}
            @endif
        </li>
    </ul>
    <a href="{{ route('index.vehiculo') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection