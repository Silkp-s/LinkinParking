<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Vehiculo;
use App\Models\Valor;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugars = Lugar::with(['vehiculo', 'valors'])->get();
        return view('lugars.index', compact('lugars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $valores = Valor::all();
        return view('lugars.create', compact('vehiculos', 'valores'));
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
            'lugar_matriz' => 'required|varchar|max:255',
            'posx' => 'required|integer|max:11',
            'posy' => 'required|integer|max:11',
            'id_vehiculo' => 'required|exists:vehiculos,id',
            'id_valors' => 'nullable|exists:valors,id',
            'ocupado' => 'required|boolean',
        ]);
        return redirect()->route('lugars.index')->with('success', 'Lugar creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Lugar::findOrFail($id);
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
        
        $request->validate([
            'lugar_matriz' => 'required|varchar|max:255',
            'posx' => 'required|integer|max:11',
            'posy' => 'required|integer|max:11',
            'id_vehiculo' => 'required|exists:vehiculos,id',
            'id_valors' => 'nullable|exists:valors,id',
            'ocupado' => 'required|boolean',
        ]);
        $lugar->update($request->all());
        return redirect()->route('lugars.index')->with('success', 'Lugar actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lugar->delete();
        return redirect()->route('lugars.index')->with('success', 'Lugar eliminado con éxito.');
    
    }
}
