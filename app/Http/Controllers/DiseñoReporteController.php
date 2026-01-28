<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiseñoReporte; // Mantenemos tu modelo original
use Illuminate\Support\Facades\Storage; // Necesario para borrar archivos

class DiseñoReporteController extends Controller
{
    public function index()
    {
        $diseños = DiseñoReporte::all();
        return view('diseños_especiales.diseño_reporte', compact('diseños'));
    }

    public function create()
    {
        return view('diseños_especiales.create_diseño_reporte');
    }

    public function store(Request $request)
    {
        // 1. Validación: cambiamos 'string' por 'file' en el campo file
        $request->validate([
            'report' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:5000', // PDF o Word hasta 5MB
            'date' => 'required|date',
            'time' => 'required',
            'size' => 'required|string|max:50',
        ]);

        $datos = $request->all();

        // 2. Lógica de guardado de archivo físico
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('reportes', 'public');
            $datos['file'] = $path; // Reemplazamos el objeto file por la ruta string para la DB
        }

        DiseñoReporte::create($datos);

        return redirect()->route('diseños.index')->with('success', 'Reporte guardado correctamente');
    }

    public function show($id)
    {
        $diseño = DiseñoReporte::findOrFail($id);
        return view('diseños_especiales.show_diseño_reporte', compact('diseño'));
    }

    public function edit($id)
    {
        $diseño = DiseñoReporte::findOrFail($id);
        return view('diseños_especiales.edit_diseño_reporte', compact('diseño'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'report' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:5000', // nullable por si no desea cambiar el archivo
            'date' => 'required|date',
            'time' => 'required',
            'size' => 'required|string|max:50',
        ]);

        $diseño = DiseñoReporte::findOrFail($id);
        $datos = $request->all();

        // Si el usuario sube un nuevo archivo en la edición
        if ($request->hasFile('file')) {
            // Borramos el archivo viejo para no llenar el disco de basura
            if ($diseño->file) {
                Storage::disk('public')->delete($diseño->file);
            }
            // Guardamos el nuevo
            $datos['file'] = $request->file('file')->store('reportes', 'public');
        }

        $diseño->update($datos);

        return redirect()->route('diseños.index');
    }

    public function destroy($id)
    {
        $diseño = DiseñoReporte::findOrFail($id);

        // 3. Borramos el archivo físico antes de eliminar el registro
        if ($diseño->file) {
            Storage::disk('public')->delete($diseño->file);
        }

        $diseño->delete();
        return redirect()->route('diseños.index');
    }
}
