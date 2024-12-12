@extends('layouts.dashboard')

@section('content')

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
          <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Lista de Usuarios</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Usuarios</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lista</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    <!-- END Hero -->

    <div class="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter mt-3">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                    @if($role == 'admin')
                                        <span class="badge bg-warning">{{ $role }}</span>
                                    @elseif($role == 'usuario')
                                        <span class="badge bg-success">{{ $role }}</span>
                                    @else
                                        <span class="badge bg-info">{{ $role }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div>
                                    <a type="button" href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-alt-info mb-1" data-bs-toggle="tooltip"
                                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-alt-danger mb-1" data-bs-toggle="tooltip"
                                        title="Borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection