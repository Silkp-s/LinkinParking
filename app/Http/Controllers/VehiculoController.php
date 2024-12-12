<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use App\Models\Cliente;


use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = Vehiculo::paginate(5);
        return view('vehiculo.index', compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Cliente::all();
        return view('vehiculo.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patente' => 'required|string|max:6',
            'id_cliente' => 'required|exists:clientes,id',
        ]);
    
        $vehiculo = Vehiculo::create([
            'patente' => $request->patente,
            'id_cliente' => $request->id_cliente
        ]);
    
        return redirect()->route('index.vehiculo')->with('success', 'Vehiculo creado exitosamente');
    }
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::with(['cliente'])->findOrFail($id);
        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::all();
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.edit', compact('vehiculo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $vehiculo->update([
            'patente' => $request->patente
        ]);
        return redirect()->route('index.vehiculo')->with('success','Vehiculo editado con exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::with(['cliente'])->findOrFail($id);
        //$vehiculo->clientes()->detach();
        $vehiculo->delete();

        return redirect()->route('index.vehiculo')->with('success','Vehiculo eliminado exitosamente'); 
    }
}
