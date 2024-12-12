@extends('layouts.app')
@section('title','')

@section('content')
<h1 class="text-center mb-4">Vehiculos</h1>
<a href="{{ route('create.vehiculo') }}" class="btn btn-custom mb-3">Agregar Vehiculo</a>
<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patente</th>
            <th>Cliente ID </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($vehiculo as $vehiculos)
            <tr>
                <td>{{ $vehiculos->id }}</td>
                <td>{{ $vehiculos->patente }}</td>
                <td> @if ($vehiculos->cliente) {{ $vehiculos->cliente->id }} 
                    @else Sin cliente 
                    @endif </td>              
                <td>
                    <a href="{{ route('show.vehiculo', $vehiculos->id) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{ route('edit.vehiculo', $vehiculos->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('destroy.vehiculo', $vehiculos->id) }}">
                        Eliminar
                    </button>
                    
                    <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black bg-gradient">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este vehiculo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('destroy.vehiculo', $vehiculos->id) }}", id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
                    

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No hay vehiculos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center my-4">
    {{ $vehiculo->links('pagination::bootstrap-4') }}
</div>

<td>


</td>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection