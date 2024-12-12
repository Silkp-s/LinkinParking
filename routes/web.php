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
Route::post('/reservaciones', [VistaEmpleadoController::class, 'store'])->name('store.reservacion');
Route::post('/lugar-simonweco', [VistaEmpleadoController::class, 'getLugarDetalles'])->name('detalles.lugar');
Route::delete('/eliminar-reservacion', [VistaEmpleadoController::class, 'eliminarReservacion'])->name('eliminar.reservacion');

