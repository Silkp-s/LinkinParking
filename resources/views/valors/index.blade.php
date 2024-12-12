@extends('layouts\app')

@section('title', 'Lista de Valores')

@section('content')
    <h1>Lista de Valores</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para crear un nuevo valor -->
    <a href="{{ route('valors.create') }}" class="btn btn-primary">Crear Valor</a>

    <!-- Tabla de valores -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estacionamiento</th>
                <th>Valor por Minuto</th>
                <th>Cantidad de Lugares</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($valors as $valor)
                <tr>
                    <td>{{ $valor->id }}</td>
                    <td>{{ $valor->estacionamiento->lugar_matriz }}</td>
                    <td>{{ $valor->valor_minuto }}</td>
                    <td>{{ $valor->cantidad_lugares }}</td>
                    <td>
                        <a href="{{ route('valors.edit', $valor->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('valors.destroy', $valor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este valor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
