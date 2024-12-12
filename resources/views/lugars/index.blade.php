@extends('layouts\app')

@section('content')
<h1>Lista de Lugares</h1>
<a href="{{ route('lugars.create') }}" class="btn btn-primary">Crear Lugar</a>
<table>
    <thead>
        <tr>
            <th>Lugar Matriz</th>
            <th>Posición X</th>
            <th>Posición Y</th>
            <th>Vehículo</th>
            <th>Valor</th>
            <th>Ocupado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lugars as $lugar)
        <tr>
            <td>{{ $lugar->lugar_matriz }}</td>
            <td>{{ $lugar->posx }}</td>
            <td>{{ $lugar->posy }}</td>
            <td>{{ $lugar->vehiculo->patente ?? 'N/A' }}</td>
            <td>{{ $lugar->valors->nombre ?? 'N/A' }}</td>
            <td>{{ $lugar->ocupado ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('lugars.edit', $lugar->id) }}">Editar</a>
                <form action="{{ route('lugars.destroy', $lugar->id) }}" method="POST" style="display:inline;">
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
