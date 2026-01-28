<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categorias = Categoria::all();
        // Asegúrate de que esta ruta de vista sea exacta
        return view('profesiones_cargos_categorias.Tabulaciones_categorias', compact('categorias'));
    }

    public function create(): View
    {
        return view('profesiones_cargos_categorias.create_tabulaciones_categorias');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'campo_grupo' => 'required|string',
            'salario'     => 'required|numeric', // Cambiado a numeric si es dinero
            'bono_mes'    => 'required|numeric',
            'bono_dia'    => 'required|numeric',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada.');
    }

    public function show(string $id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('profesiones.categorias.show_tabulaciones_categorias', compact('categoria'));
    }

    public function edit(string $id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('profesiones_cargos_categorias.edit_tabulaciones_categorias', compact('categoria'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'campo_grupo' => 'required|string',
            'salario'     => 'required|numeric',
            'bono_mes'    => 'required|numeric',
            'bono_dia'    => 'required|numeric',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada.');
    }
}