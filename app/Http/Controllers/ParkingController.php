<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lugar;
use Carbon\Carbon;

class ParkingController extends Controller
{
    public function calculateEstimate()
    {
        $user = Auth::user(); // Usuario autenticado
        $clienteId = $user->id; // ID del cliente
        $precioPorMinuto = 2000; // Precio fijo por minuto

        $lugar = Lugar::with('vehiculo')->whereHas('vehiculo', function ($query) use ($clienteId) {
            $query->where('id_cliente', $clienteId);
        })->first();

        $tiempo = 0;
        $precioEstimado = 0;

        if ($lugar && $lugar->vehiculo) {
            $entrada = Carbon::parse($lugar->created_at);
            $salida = now(); // Hora actual para la estimación
            $tiempo = $salida->diffInMinutes($entrada);
            $precioEstimado = $tiempo * $precioPorMinuto;
        }

        return response()->json([
            'tiempo' => $tiempo,
            'precioEstimado' => $precioEstimado,
        ]);
    }

    public function processPayment()
    {
        $user = Auth::user(); // Usuario autenticado
        $clienteId = $user->id; // ID del cliente
        $precioPorMinuto = 2000; // Precio fijo por minuto

        $lugar = Lugar::with('vehiculo')->whereHas('vehiculo', function ($query) use ($clienteId) {
            $query->where('id_cliente', $clienteId);
        })->first();

        $tiempo = 0;
        $precioFinal = 0;

        if ($lugar && $lugar->vehiculo) {
            $entrada = Carbon::parse($lugar->created_at);
            $salida = now();
            $tiempo = $salida->diffInMinutes($entrada);
            $precioFinal = $tiempo * $precioPorMinuto;

            // Actualizar la salida en la base de datos
            $lugar->updated_at = $salida;
            $lugar->save();
        }

        return response()->json([
            'tiempo' => $tiempo,
            'precioFinal' => $precioFinal,
        ]);
    }
}
