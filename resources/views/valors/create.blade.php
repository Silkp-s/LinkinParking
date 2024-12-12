@extends('layouts\app')

@section('title', 'Crear Valor')

@section('content')
    <h1>Crear Nuevo Valor</h1>

    <form action="{{ route('valors.store') }}" method="POST">
        @csrf

        <!-- Estacionamiento -->
        <div class="mb-3">
            <label for="id_estacionamiento" class="form-label">Estacionamiento</label>
            <select name="id_estacionamiento" id="id_estacionamiento" class="form-control" required>
                <option value="">Seleccione un estacionamiento</option>
                @foreach($estacionamientos as $estacionamiento)
                    <option value="{{ $estacionamiento->id }}">{{ $estacionamiento->lugar_matriz }}</option>
                @endforeach
            </select>
            @error('id_estacionamiento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Valor por minuto -->
        <div class="mb-3">
            <label for="valor_minuto" class="form-label">Valor por Minuto</label>
            <input type="number" name="valor_minuto" id="valor_minuto" class="form-control" required>
            @error('valor_minuto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cantidad de lugares -->
        <div class="mb-3">
            <label for="cantidad_lugares" class="form-label">Cantidad de Lugares</label>
            <input type="number" name="cantidad_lugares" id="cantidad_lugares" class="form-control" required>
            @error('cantidad_lugares')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
