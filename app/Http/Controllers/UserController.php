<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
     /**
     * Mostrar una lista de todos los usuarios.
     */
    public function index()
    {
        // Obtén todos los usuarios
        $users = User::all();

        // Retorna la vista con la lista de usuarios
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        // Encuentra el usuario por ID
        $user = User::findOrFail($id);

        // Obtiene todos los roles disponibles para poder asignar al usuario
        $roles = Role::all();

        // Retorna la vista con los datos del usuario y los roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Encuentra al usuario por su ID
        $user = User::findOrFail($id);

        // Valida los datos recibidos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Actualiza el usuario con los datos validados
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Sincroniza el rol seleccionado
        $user->syncRoles($request->role);

        // Redirige con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }



    /**
     * Mostrar la lista de roles.
     */
    public function listRoles()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Mostrar el formulario para crear un nuevo rol.
     */
    public function createRole()
    {
        return view('admin.roles.create');
    }

    /**
     * Guardar un nuevo rol en la base de datos.
     */
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Rol creado correctamente');
    }

    /**
     * Eliminar un rol existente.
     */
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);

        if (in_array($role->name, ['admin', 'usuario'])) {
            return redirect()->route('admin.roles.index')->with('error', 'Este rol no se puede eliminar');
        }

        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Rol eliminado correctamente');
    }
}
