<?php

namespace App\Http\Controllers;

use App\Models\TablaAuxiliar;
use Illuminate\Http\Request;

class TablaAuxiliarController extends Controller
{
    public function index() {
        $tablasAuxiliares = TablaAuxiliar::all();
        return view('Formulacion_Conceptos.Tablas auxiliares para constantes', compact('tablasAuxiliares'));
    }

    public function create() {
        return view('Formulacion_Conceptos.create_tablas_auxiliares');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:tabla_auxiliars,codigo|max:10',
            'descripcion' => 'required|max:255',
        ]);

        TablaAuxiliar::create($request->all());
        return redirect()->route('tablas_auxiliares.index')->with('success', 'Registro agregado');
    }

    public function edit($id) {
        $tablaAuxiliar = TablaAuxiliar::findOrFail($id);
        return view('Formulacion_Conceptos.edit_tablas_auxiliares', compact('tablaAuxiliar'));
    }

    public function update(Request $request, $id) {
        $tablaAuxiliar = TablaAuxiliar::findOrFail($id);

        $request->validate([
            'codigo' => 'required|max:10|unique:tabla_auxiliars,codigo,' . $id,
            'descripcion' => 'required|max:255',
        ]);

        $tablaAuxiliar->update($request->all());
        return redirect()->route('tablas_auxiliares.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id) {
        $tablaAuxiliar = TablaAuxiliar::findOrFail($id);
        $tablaAuxiliar->delete();
        return redirect()->back()->with('success', 'Registro eliminado');
    }
}
