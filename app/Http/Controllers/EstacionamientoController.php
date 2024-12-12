<?php

namespace App\Http\Controllers;
use App\Models\Estacionamiento;
use App\Models\Lugar;
use Illuminate\Http\Request;

class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamientos = Estacionamiento::with('lugar')->get();
        return view('estacionamientos.index', compact('estacionamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares = Lugar::all(); // Asegúrate de tener el modelo Lugar definido.
        return view('estacionamientos.create', compact('lugares'));
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
            'id_lugar' => 'required|exists:lugars,id',
        ]);

        Estacionamiento::create($request->all());
        return redirect()->route('estacionamientos.index')->with('success', 'Estacionamiento creado con éxito.');
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
    public function edit(Estacionamiento $estacionamiento)
    {
        $lugares = Lugar::all();
        return view('estacionamientos.edit', compact('estacionamiento', 'lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estacionamiento $estacionamiento)
    {
        $request->validate([
            'lugar_matriz' => 'required|string',
            'id_lugar' => 'required|exists:lugars,id',
        ]);

        $estacionamiento->update($request->all());
        return redirect()->route('estacionamientos.index')->with('success', 'Estacionamiento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estacionamiento $estacionamiento)
    {
        $estacionamiento->delete();
        $estacionamiento = Estacionamiento::findOrFail($id);
        return redirect()->route('estacionamientos.index')->with('success', 'Estacionamiento eliminado con éxito.');

    }
}
