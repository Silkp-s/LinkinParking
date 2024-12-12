@extends('layouts.app')
@section('title','')

@section('content')

    <div class="container">
        <h1>Crear Vehículo</h1>
        <form action="{{ route('store.vehiculo') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="patente">Patente:</label>
                <input type="text" class="form-control" id="patente" name="patente" value="{{ old('patente') }}">
            </div>

            
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select class="form-control" id="id_cliente" name="id_cliente">
                    @foreach ($cliente as $clientes)
                        <option value="{{ $clientes->id }}">{{ $clientes->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>



@endsection
