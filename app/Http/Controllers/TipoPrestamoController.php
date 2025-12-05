<?php

namespace App\Http\Controllers;

use App\Models\TipoPrestamo;
use Illuminate\Http\Request;

class TipoPrestamoController extends Controller
{
    // Mostrar lista
    public function index()
    {
        $tipos = TipoPrestamo::all();
        return view('tipos.tipos_prestamos', compact('tipos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('tipos.create');
    }

    // Guardar nuevo tipo
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:tipos_prestamos,codigo',
            'descripcion' => 'required'
        ]);

        TipoPrestamo::create($request->all());

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de préstamo agregado correctamente.');
    }

    // Editar
    public function edit($id)
    {
        $tipo = TipoPrestamo::findOrFail($id);
        return view('tipos.edit', compact('tipo'));
    }

    // Actualizar
    public function update(Request $request, $id)
    {
        $tipo = TipoPrestamo::findOrFail($id);
        $request->validate([
            'codigo' => 'required|unique:tipos_prestamos,codigo,' . $tipo->id,
            'descripcion' => 'required'
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de préstamo actualizado correctamente.');
    }

    // Eliminar
    public function destroy($id)
    {
        $tipo = TipoPrestamo::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de préstamo eliminado correctamente.');
    }
}