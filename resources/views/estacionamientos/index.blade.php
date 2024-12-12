@extends('layouts\app')

@section('content')
<h1>Lista de Estacionamientos</h1>
<a href="{{ route('index.estacionamiento') }}">Actualizar Página</a>
<a href="{{ route('estacionamientos.create') }}" class="btn btn-primary mb-3">Crear Estacionamiento</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Lugar Matriz</th>
            <th>ID Lugar</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estacionamientos as $estacionamiento)
        <tr>
            <td>{{ $estacionamiento->id }}</td>
            <td>{{ $estacionamiento->lugar_matriz }}</td>
            <td>{{ $estacionamiento->id_lugar }}</td>
            <td>
            <a href="{{ route('estacionamientos.edit', $estacionamiento->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('estacionamientos.destroy', $estacionamiento->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estacionamiento?')">Eliminar</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
