<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Reservacion;
use App\Models\Valor;
class VistaEmpleadoController extends Controller
{
    public function index()
    {
        $lugares=Lugar::with('vehiculo')->get();
        $clientes = Cliente::all();
        $vehiculos=Vehiculo::all();
        return view('vistaEmpleado.index',compact('lugares','clientes','vehiculos'));
    }

    public function store(Request $request){
        $lugares=Lugar::with('vehiculo')->get();
        $clientes = Cliente::all();
        $vehiculos=Vehiculo::all();

        $lugar=Lugar::findOrFail($request->lugar_id);
        $lugar->ocupado = 1 ;
        $lugar->save();
        // Crear reservación index.vistaEmpleados
        Reservacion::create([
            'lugar_id' => $request->lugar_id,
            'auto_id' => $request->auto_id,
            'cliente_id' => $request->cliente_id,
            'fecha_inicio' => $request->fecha_inicio,          
        ]);
        return redirect()->route('index.vistaEmpleados')->with('success', 'Reservación creada con éxito.');
    }

    public function destroy(Request $request ){
        $lugares=Lugar::with('vehiculo')->get();
        $clientes = Cliente::all();
        $vehiculos=Vehiculo::all();

    }

    public function getLugarDetalles(Request $request){

        $lugarid = $request->input('lugar_id');      
        $lugar = Lugar::with(['reservaciones' => function ($query) {
            $query->whereNull('fecha_fin'); 
        }, 'reservaciones.auto'])->find($lugarid);     
        $reservacion = $lugar->reservaciones->first();    
        $vehiculo=$reservacion->auto;
        $tiempoOcupacion =now()->diffInMinutes($reservacion->fecha_inicio);
        $valor = Valor::findOrFail($lugar->id_valors)->first();
        $valorporminuto = $valor->valor_minuto;  
        $monto=$valorporminuto*$tiempoOcupacion;
        return response()->json([
            'vehiculo'=> $vehiculo->patente,
            'tiempo_ocupacion'=>$tiempoOcupacion,
            'monto'=>$monto
        ]);
    }

    public function eliminarReservacion(Request $request)
{

    $request->validate([
        'lugar_id' => 'required|integer|exists:lugars,id',
    ]);
    $reservacion = Reservacion::where('lugar_id', $request->lugar_id)
        ->whereNull('fecha_fin')
        ->first();
    // Eliminar la reservación
    if($reservacion){
    $reservacion->delete();
    $lugar=Lugar::findOrFail($request->lugar_id);
    $lugar->ocupado = 0 ;
    $lugar->save();
    }
    $lugares=Lugar::with('vehiculo')->get();
    $clientes = Cliente::all();
    $vehiculos=Vehiculo::all();
    return response()->json(['message' => 'Reservación eliminada con éxito.',
    'redirect'=>route('index.vistaEmpleados')]
    , 200);
}
}

