<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos el primer (y único) registro de la empresa
    $empresa = Empresa::first();

    // Si no hay empresa creada, vamos al formulario de creación
    if (!$empresa) {
        return redirect()->route('empresas.create');
    }

    return view('empresas.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:empresas',
            'nombre' => 'required|string|max:255',
            'nro_serial' => 'required|string',
            'telefono' => 'required|string',
            // Agrega el resto de validaciones según necesites
        ]);

        Empresa::create($request->all());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'codigo' => 'required|string|unique:empresas,codigo,' . $empresa->id,
            'nombre' => 'required|string|max:255',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa eliminada.');
    }
}
