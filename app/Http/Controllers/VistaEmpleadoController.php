<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Vehiculo;
class VistaEmpleadoController extends Controller
{
    public function index()
    {
        $lugares=Lugar::with('vehiculo')->get();
        return view('vistaEmpleado.index',compact('lugares'));
    }
}
