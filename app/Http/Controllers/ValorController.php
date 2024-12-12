<?php

namespace App\Http\Controllers;
use App\Models\Valor;
use App\Models\Estacionamiento;
use Illuminate\Http\Request;

class ValorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valors = Valor::all();
        return view('valors.index', compact('valors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estacionamientos = Estacionamiento::all(); 
        return view('valors.create', compact('estacionamientos'));
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
            'id_estacionamiento' => 'required|exists:estacionamientos,id',
            'valor_minuto' => 'required|integer',
            'cantidad_lugares' => 'required|integer',
        ]);

        Valor::create($request->all());
        
        return redirect()->route('valors.index')->with('success', 'Valor creado con éxito.');
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
    public function edit(Valor $valor)
    {
        $estacionamientos = Estacionamiento::all(); // Obtener estacionamientos
        return view('valors.edit', compact('valor', 'estacionamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valor $valor)
    {
        $request->validate([
            'id_estacionamiento' => 'required|exists:estacionamientos,id',
            'valor_minuto' => 'required|integer',
            'cantidad_lugares' => 'required|integer',
        ]);

        $valor->update($request->all());

        return redirect()->route('valors.index')->with('success', 'Valor actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valor $valor)
    {
        $valor->delete();
        return redirect()->route('valors.index')->with('success', 'Valor eliminado con éxito.');
    }
}
