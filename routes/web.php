<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaEmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\EstacionamientoController;
use App\Http\Controllers\ValorController;


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
Route::get('/clientes', function () {
    return view('cliente.index');
});
Route::get('/vistaCliente', function () {
    return view('vistaCliente.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas vistaEmpleados
Route::get('/VistaEmpleado',[VistaEmpleadoController::class,'index'])->name('index.vistaEmpleados');
Route::get('/admin/roles', [UserController::class, 'index'])->name('admin.roles.index');

Route::get('/lugars', [LugarController::class, 'index'])->name('index.lugars');
Route::put('/lugars/{id}',[LugarController::class,'update'])->name('update.lugars');
Route::post('/lugars', [LugarController::class, 'store'])->name('store.lugars');

Route::get('/estacionamientos', [EstacionamientoController::class, 'index'])->name('index.estacionamiento');
Route::get('/estacionamientos/create', [EstacionamientoController::class, 'create'])->name('estacionamientos.create');
Route::delete('/estacionamientos/{id}', [EstacionamientoController::class, 'destroy'])->name('estacionamientos.destroy');
Route::post('/estacionamientos', [EstacionamientoController::class, 'store'])->name('estacionamientos.store');

Route::get('/lugars', [LugarController::class, 'index'])->name('index.lugars');
Route::get('/lugars/create', [LugarController::class, 'create'])->name('lugars.create');
Route::delete('/lugars/{lugar}', [LugarController::class, 'destroy'])->name('lugars.destroy');

Route::get('/valors', [ValorController::class, 'index'])->name('valors.index');
Route::get('/valors/create', [ValorController::class, 'create'])->name('valors.create');
Route::get('/valors/{valor}/edit', [ValorController::class, 'edit'])->name('valors.edit');
Route::put('/valors/{valor}', [ValorController::class, 'update'])->name('valors.update');
Route::delete('/valors/{valor}', [ValorController::class, 'destroy'])->name('valors.destroy');
Route::post('/valors', [ValorController::class, 'store'])->name('valors.store');

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

Route::post('/reservaciones', [VistaEmpleadoController::class, 'store'])->name('store.reservacion');
Route::post('/lugar-simonweco', [VistaEmpleadoController::class, 'getLugarDetalles'])->name('detalles.lugar');
Route::delete('/eliminar-reservacion', [VistaEmpleadoController::class, 'eliminarReservacion'])->name('eliminar.reservacion');

Route::middleware('auth')->group(function () {
    Route::get('/parking/estimate', [ParkingController::class, 'calculateEstimate'])->name('parking.estimate');
    Route::post('/parking/payment', [ParkingController::class, 'processPayment'])->name('parking.payment');
});

//cliente
Route::get('/clientes',[ClienteController::class,'index'])->name('index.cliente');
Route::get('/clientenuevo',[ClienteController::class,'create'])->name('create.cliente');
Route::get('/clienteshow/{id}',[ClienteController::class,'show'])->name('show.cliente');
Route::get('/clientedit/{id}',[ClienteController::class,'edit'])->name('edit.cliente');
Route::put('/cliente/{id}',[ClienteController::class,'update'])->name('update.cliente');
Route::post('/clientestore',[ClienteController::class,'store'])->name('store.cliente');
Route::delete('/cliente/{id}',[ClienteController::class,'destroy'])->name('destroy.cliente');

//vehiculos
Route::get('/vehiculos',[VehiculoController::class,'index'])->name('index.vehiculo');
Route::get('/vehiculonuevo',[VehiculoController::class,'create'])->name('create.vehiculo');
Route::get('/vehiculoshow/{id}',[VehiculoController::class,'show'])->name('show.vehiculo');
Route::get('/vehiculodit/{id}',[VehiculoController::class,'edit'])->name('edit.vehiculo');
Route::put('/vehiculo/{id}',[VehiculoController::class,'update'])->name('update.vehiculo');
Route::post('/vehiculostore',[VehiculoController::class,'store'])->name('store.vehiculo');
Route::delete('/vehiculo/{id}',[VehiculoController::class,'destroy'])->name('destroy.vehiculo');

