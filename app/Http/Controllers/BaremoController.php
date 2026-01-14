<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baremo;

class BaremoController extends Controller
{
    public function index() {
        $baremos = Baremo::all();
        return view('Formulacion_Conceptos.Baremos (Tablas Escalares)', compact('baremos'));
    }

    public function create() {
        return view('Formulacion_Conceptos.create_baremos');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:baremos,codigo|max:10',
            'descripcion' => 'required|max:255',
            'tipo_dato' => 'required|in:Dias,Meses,Años,Otros',
        ]);

        Baremo::create($request->all());
        return redirect()->route('Formulacion_Conceptos.index')->with('success', 'Registro agregado');
    }

    public function edit($id) {
        $baremo = Baremo::findOrFail($id);
        return view('Formulacion_Conceptos.edit_baremos', compact('baremo'));
    }

    public function update(Request $request, $id) {
        $baremo = Baremo::findOrFail($id);

        $request->validate([
            'codigo' => 'required|max:10|unique:baremos,codigo,' . $id,
            'descripcion' => 'required|max:255',
            'tipo_dato' => 'required|in:Dias,Meses,Años,Otros',
        ]);

        $baremo->update($request->all());
        return redirect()->route('Formulacion_Conceptos.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id) {
        $baremo = Baremo::findOrFail($id);
        $baremo->delete();
        return redirect()->back()->with('success', 'Registro eliminado');
    }
}