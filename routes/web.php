<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaEmpleadoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas vistaEmpleados
Route::get('/VistaEmpleado',[VistaEmpleadoController::class,'index'])->name('index.vistaEmpleados');
Route::get('/admin/roles', [UserController::class, 'index'])->name('admin.roles.index');

// Rutas de administración de Roles
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutas de gestión de usuarios
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Rutas de gestión de roles
    Route::get('/admin/roles', [UserController::class, 'listRoles'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [UserController::class, 'createRole'])->name('admin.roles.create');
    Route::post('/admin/roles', [UserController::class, 'storeRole'])->name('admin.roles.store');
    Route::delete('/admin/roles/{id}', [UserController::class, 'destroyRole'])->name('admin.roles.destroy');
});

// Rutas de perfil de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});