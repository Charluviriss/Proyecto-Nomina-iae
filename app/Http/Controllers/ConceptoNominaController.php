<?php

namespace App\Http\Controllers;

use App\Models\ConceptoNomina;
use App\Models\TipoNomina;
use App\Models\TipoFrecuenciaPago;
use App\Models\TipoAcumulados;
use Illuminate\Http\Request;

class ConceptoNominaController extends Controller
{
    public function index() {
        $conceptos = ConceptoNomina::all();
        $tipos_nomina_list = TipoNomina::all();
        $frecuencias_list = TipoFrecuenciaPago::all();
        $acumulados_list = TipoAcumulados::all();
        $situaciones_list = ['Activo', 'Inactivo', 'Vacaciones', 'Reposado', 'Permiso'];

        return view('Formulacion_Conceptos.Conceptos de Nomina de Pago', compact(
            'conceptos', 'tipos_nomina_list', 'frecuencias_list', 'acumulados_list', 'situaciones_list'
        ));
    }

    public function create() {
        $tipos_nomina_list = TipoNomina::all();
        $frecuencias_list = TipoFrecuenciaPago::all();
        $acumulados_list = TipoAcumulados::all();
        $situaciones_list = ['Activo', 'Inactivo', 'Vacaciones', 'Reposado', 'Permiso'];

        return view('Formulacion_Conceptos.create_conceptos_nomina', compact(
            'tipos_nomina_list', 'frecuencias_list', 'acumulados_list', 'situaciones_list'
        ));
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:concepto_nominas,codigo|max:10',
            'descripcion' => 'required|max:255',
            'tipo_concepto' => 'required|in:Asignación,Deducción,Patronal',
            'unidad' => 'required|in:Monto,Horas,Porcentaje,Días,Semanas',
        ]);

        $data = $request->all();
        // Convertir campos de checkbox a booleanos
        $checkboxes = [
            'imprime_detalles', 'prorratea', 'fijo', 'usa_descripcion_alternativa', 
            'modifica_descripcion', 'bonificable', 'hoja_tiempo', 
            'muestra_valor_referencia', 'muestra_monto_calculo'
        ];
        foreach ($checkboxes as $cb) {
            $data[$cb] = $request->has($cb) ? 1 : 0;
        }

        ConceptoNomina::create($data);
        return redirect()->route('conceptos_nomina.index')->with('success', 'Concepto agregado correctamente');
    }

    public function edit($id) {
        $concepto = ConceptoNomina::findOrFail($id);
        $tipos_nomina_list = TipoNomina::all();
        $frecuencias_list = TipoFrecuenciaPago::all();
        $acumulados_list = TipoAcumulados::all();
        $situaciones_list = ['Activo', 'Inactivo', 'Vacaciones', 'Reposado', 'Permiso'];

        return view('Formulacion_Conceptos.edit_conceptos_nomina', compact(
            'concepto', 'tipos_nomina_list', 'frecuencias_list', 'acumulados_list', 'situaciones_list'
        ));
    }

    public function update(Request $request, $id) {
        $concepto = ConceptoNomina::findOrFail($id);

        $request->validate([
            'codigo' => 'required|max:10|unique:concepto_nominas,codigo,' . $id,
            'descripcion' => 'required|max:255',
            'tipo_concepto' => 'required|in:Asignación,Deducción,Patronal',
            'unidad' => 'required|in:Monto,Horas,Porcentaje,Días,Semanas',
        ]);

        $data = $request->all();
        
        $checkboxes = [
            'imprime_detalles', 'prorratea', 'fijo', 'usa_descripcion_alternativa', 
            'modifica_descripcion', 'bonificable', 'hoja_tiempo', 
            'muestra_valor_referencia', 'muestra_monto_calculo'
        ];
        foreach ($checkboxes as $cb) {
            $data[$cb] = $request->has($cb) ? 1 : 0;
        }

        $concepto->update($data);
        return redirect()->route('conceptos_nomina.index')->with('success', 'Concepto actualizado correctamente');
    }

    public function destroy($id) {
        $concepto = ConceptoNomina::findOrFail($id);
        $concepto->delete();
        return redirect()->back()->with('success', 'Concepto eliminado');
    }
}
