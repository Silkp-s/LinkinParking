<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaEmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VistaClienteController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas vistaEmpleados
Route::get('/VistaEmpleado',[VistaEmpleadoController::class,'index'])->name('index.vistaEmpleados');
Route::post('/reservaciones', [VistaEmpleadoController::class, 'store'])->name('store.reservacion');
Route::post('/lugar-simonweco', [VistaEmpleadoController::class, 'getLugarDetalles'])->name('detalles.lugar');
Route::delete('/eliminar-reservacion', [VistaEmpleadoController::class, 'eliminarReservacion'])->name('eliminar.reservacion');

Route::get('/vistaCliente',[VistaClienteController::class,'index'])->name('index.vistaCliente');
Route::post('/reservaciones', [VistaClienteController::class, 'store'])->name('store.reservacion');
Route::post('/lugar-simonweco', [VistaClienteController::class, 'getLugarDetalles'])->name('detalles.lugar');
Route::delete('/eliminar-reservacion', [VistaClienteController::class, 'eliminarReservacion'])->name('eliminar.reservacion');
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