<?php

namespace App\Http\Controllers;

use App\Models\AdicionalConcepto;
use Illuminate\Http\Request;

class AdicionalConceptoController extends Controller
{
    public function index() {
        $adicionales = AdicionalConcepto::all();
        return view('Formulacion_Conceptos.Adicionales Conceptos (Constantes)', compact('adicionales'));
    }

    public function create() {
        return view('Formulacion_Conceptos.create_adicionales_conceptos');
    }

    public function store(Request $request) {
        $request->validate([
            'nro_constante' => 'required|unique:adicional_conceptos,nro_constante|max:10',
            'descripcion' => 'required|max:255',
            'etiqueta' => 'required|max:255',
            'tipo_dato' => 'required|in:Alfanumérico,Numérico,Fecha,Tablas',
        ]);

        AdicionalConcepto::create($request->all());
        return redirect()->route('adicionales_conceptos.index')->with('success', 'Registro agregado');
    }

    public function edit($id) {
        $adicional = AdicionalConcepto::findOrFail($id);
        return view('Formulacion_Conceptos.edit_adicionales_conceptos', compact('adicional'));
    }

    public function update(Request $request, $id) {
        $adicional = AdicionalConcepto::findOrFail($id);

        $request->validate([
            'nro_constante' => 'required|max:10|unique:adicional_conceptos,nro_constante,' . $id,
            'descripcion' => 'required|max:255',
            'etiqueta' => 'required|max:255',
            'tipo_dato' => 'required|in:Alfanumérico,Numérico,Fecha,Tablas',
        ]);

        $adicional->update($request->all());
        return redirect()->route('adicionales_conceptos.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id) {
        $adicional = AdicionalConcepto::findOrFail($id);
        $adicional->delete();
        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
