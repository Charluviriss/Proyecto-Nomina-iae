<?php

namespace App\Http\Controllers;

use App\Models\DisenoArchivoTexto;
use Illuminate\Http\Request;

class DisenoArchivoTextoController extends Controller
{
    public function index()
    {
        $disenos = DisenoArchivoTexto::all();
        return view('diseños_especiales.diseño_archivo_texto', compact('disenos'));
    }

    public function create()
    {
        return view('diseños_especiales.create_diseño_archivo_texto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'organismo' => 'required|max:100',
            'notas' => 'nullable',
        ]);

        DisenoArchivoTexto::create($request->all());

        return redirect()->route('diseno.index')->with('success', 'Registro agregado.');
    }

    public function show($id)
    {
        $diseno = DisenoArchivoTexto::findOrFail($id);
        return view('diseños_especiales.show_diseño_archivo_texto', compact('diseno'));
    }

    public function edit($id)
    {
        $diseno = DisenoArchivoTexto::findOrFail($id);
        return view('diseños_especiales.edit_diseño_archivo_texto', compact('diseno'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'organismo' => 'required|max:100',
            'notas' => 'nullable',
        ]);

        $diseno = DisenoArchivoTexto::findOrFail($id);
        $diseno->update($request->all());

        return redirect()->route('diseno.index')->with('success', 'Registro actualizado.');
    }

    public function destroy($id)
    {
        DisenoArchivoTexto::findOrFail($id)->delete();
        return redirect()->route('diseno.index')->with('success', 'Registro eliminado.');
    }
}
