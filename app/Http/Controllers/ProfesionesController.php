<?php

namespace App\Http\Controllers;

use App\Models\Profesion;
use Illuminate\Http\Request;

class ProfesionesController extends Controller
{
    public function index()
    {
        $profesiones = Profesion::all();
        return view('profesiones_cargos_categorias.profesiones_o_ocupaciones', compact('profesiones'));
    } // <-- Aquí solo debe cerrar el método index

    public function create()
    {
        return view('profesiones_cargos_categorias.create_profesiones_o_ocupaciones');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        Profesion::create($request->all());

        return redirect()->route('profesiones_o_ocupaciones.index')->with('success', 'Profesion creada exitosamente');
    }

    public function show($id)
    {
        $profesion = Profesion::findOrFail($id);
        return view('profesiones.show_profesiones_o_ocupaciones', compact('profesion'));
    }

    public function edit($id)
    {
        $profesion = Profesion::findOrFail($id);
        return view('profesiones_cargos_categorias.edit_profesiones_o_ocupaciones', compact('profesion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        $profesion = Profesion::findOrFail($id);
        $profesion->update($request->all());

        return redirect()->route('profesiones_o_ocupaciones.index')->with('success', 'Profesion actualizada');
    }

    public function destroy($id)
    {
        $profesion = Profesion::findOrFail($id);
        $profesion->delete();

        return redirect()->route('profesiones_o_ocupaciones.index')->with('success', 'Profesion eliminada');
    }
} // <-- Esta llave cierra la clase correctamente
