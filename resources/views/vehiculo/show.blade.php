@extends('layouts.app')
@section('title','')

@section('content')
<div class="container">
    <h1>Detalles del Vehiculo</h1>
    <ul>
        <li><strong>ID:</strong> {{ $vehiculo->id }}</li>
        <li><strong>Nombre:</strong> {{ $vehiculo->patente }}</li>
    </ul>
    <a href="{{ route('index.vehiculo') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection