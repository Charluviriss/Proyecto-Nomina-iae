<?php

namespace App\Http\Controllers;

use App\Models\ConstanteFormula;
use Illuminate\Http\Request;

class ConstanteFormulaController extends Controller
{
    public function index() {
        $constantes = ConstanteFormula::all();
        return view('Formulacion_Conceptos.Constantes de Formulas', compact('constantes'));
    }

    public function create() {
        return view('Formulacion_Conceptos.create_constantes_formulas');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:constante_formulas,codigo|max:10',
            'etiqueta' => 'required|max:255',
            'tipo_campo' => 'required|in:Alfanumérico,Numérico,Fecha',
        ]);

        ConstanteFormula::create($request->all());
        return redirect()->route('constantes_formulas.index')->with('success', 'Constante agregada correctamente');
    }

    public function edit($id) {
        $constante = ConstanteFormula::findOrFail($id);
        return view('Formulacion_Conceptos.edit_constantes_formulas', compact('constante'));
    }

    public function update(Request $request, $id) {
        $constante = ConstanteFormula::findOrFail($id);

        $request->validate([
            'codigo' => 'required|max:10|unique:constante_formulas,codigo,' . $id,
            'etiqueta' => 'required|max:255',
            'tipo_campo' => 'required|in:Alfanumérico,Numérico,Fecha',
        ]);

        $constante->update($request->all());
        return redirect()->route('constantes_formulas.index')->with('success', 'Constante actualizada correctamente');
    }

    public function destroy($id) {
        $constante = ConstanteFormula::findOrFail($id);
        $constante->delete();
        return redirect()->back()->with('success', 'Constante eliminada');
    }
}
