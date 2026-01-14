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
        $request->validate([
            'descripcion_nomina' => 'required|string|max:100',
        ]);

        TipoNomina::create($request->all());

        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina registrada con éxito!');
    }

    public function edit($id)
    {
        $tipoNomina = TipoNomina::findOrFail($id);
        return view('tipos.edit_tipo_nomina', compact('tipoNomina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion_nomina' => 'required|string|max:100',
        ]);

        $tipoNomina = TipoNomina::findOrFail($id);
        $tipoNomina->update($request->all());

        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina actualizada con éxito!');
    }

    public function destroy($id)
    {
        $tipoNomina = TipoNomina::findOrFail($id);
        $tipoNomina->delete();

        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nómina eliminada con éxito!');
    }
}
