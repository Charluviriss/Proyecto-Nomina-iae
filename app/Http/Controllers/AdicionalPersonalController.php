<?php

namespace App\Http\Controllers;

use App\Models\AdicionalPersonal;
use Illuminate\Http\Request;

class AdicionalPersonalController extends Controller
{
    public function index() {
        $adicionales = AdicionalPersonal::all();
        return view('Formulacion_Conceptos.Adicionales Personal (Constantes)', compact('adicionales'));
    }

    public function create() {
        return view('Formulacion_Conceptos.create_adicionales_personal');
    }

    public function store(Request $request) {
        $request->validate([
            'nro_constante' => 'required|unique:adicional_personals,nro_constante|max:10',
            'descripcion' => 'required|max:255',
            'etiqueta' => 'required|max:255',
            'tipo_dato' => 'required|in:Alfanumérico,Numérico,Fecha,Tablas',
        ]);

        AdicionalPersonal::create($request->all());
        return redirect()->route('adicionales_personal.index')->with('success', 'Registro agregado');
    }

    public function edit($id) {
        $adicional = AdicionalPersonal::findOrFail($id);
        return view('Formulacion_Conceptos.edit_adicionales_personal', compact('adicional'));
    }

    public function update(Request $request, $id) {
        $adicional = AdicionalPersonal::findOrFail($id);

        $request->validate([
            'nro_constante' => 'required|max:10|unique:adicional_personals,nro_constante,' . $id,
            'descripcion' => 'required|max:255',
            'etiqueta' => 'required|max:255',
            'tipo_dato' => 'required|in:Alfanumérico,Numérico,Fecha,Tablas',
        ]);

        $adicional->update($request->all());
        return redirect()->route('adicionales_personal.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id) {
        $adicional = AdicionalPersonal::findOrFail($id);
        $adicional->delete();
        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
