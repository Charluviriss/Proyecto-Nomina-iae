<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoParentesco;

class TipoParentescoController extends Controller
{
    public function index()
    {
        $tipos = TipoParentesco::all();
        return view('tipos.tipo_parentesco', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create_tipo_parentesco');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        TipoParentesco::create($request->all());

        return redirect()->route('tipo_parentesco.index')->with('success', 'Tipo de parentesco creado.');
    }

    public function show($id)
    {
        $tipo = TipoParentesco::findOrFail($id);
        return view('tipos.show_tipo_parentesco', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = TipoParentesco::findOrFail($id);
        return view('tipos.edit_tipo_parentesco', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoParentesco::findOrFail($id);
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);
        $tipo->update($request->all());

        return redirect()->route('tipo_parentesco.index')->with('success', 'Tipo de parentesco actualizado.');
    }

    public function destroy($id)
    {
        TipoParentesco::destroy($id);
        return redirect()->route('tipo_parentesco.index')->with('success', 'Tipo de parentesco eliminado.');
    }
}
