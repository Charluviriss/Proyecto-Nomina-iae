<?php

namespace App\Http\Controllers;

use App\Models\TipoNomina;
use Illuminate\Http\Request;

class TipoNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoNomina = TipoNomina::all();
        return view('tipos.show_tipo_nomina' , compact('tipoNomina'));        
    }

    public function create()
    {
        return view('tipos.tipo_nomina');
    }

    public function store(Request $request)
    {
        // PASO 1: VALIDACIÓN MEJORADA
    $request->validate([
        // 'unique:tipo_nominas' le dice a Laravel que busque si ya existe ese valor en la tabla
        'descripcion_nomina' => 'required|string|max:100|unique:tipo_nominas,descripcion_nomina',
    ], [
        // Opcional: Personalizar el mensaje de error
        'descripcion_nomina.unique' => 'Ese tipo de nómina ya existe en nuestros registros.',
    ]);

        TipoNomina::create($request->all());

        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina registrada con éxito!');
    }

    //public function edit($id)
    //{
    //    $tipoNomina = TipoNomina::findOrFail($id);
    //    return view('tipos.edit_tipo_nomina', compact('tipoNomina'));
    //}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoNomina $tipoNomina)
    {
        return view('tipos.edit_tipo_nomina', compact('tipoNomina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoNomina $tipoNomina)
    {
        $request->validate([
        // El tercer parámetro es el ID que debe ignorar
        'descripcion_nomina' => 'required|string|max:100|unique:tipo_nominas,descripcion_nomina,' . $tipoNomina->id,
    ], [
        'descripcion_nomina.unique' => 'No puedes poner ese nombre porque ya pertenece a otra nómina.',
    ]);

        $tipoNomina->update($request->all());

        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina actualizada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoNomina $tipoNomina)
    {
        $tipoNomina->delete();
        
        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina eliminada con éxito!');
    }
}
