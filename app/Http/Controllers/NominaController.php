<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\NominaDetalles;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargamos la relación para saber el nombre del tipo de nómina
        $nominas = Nomina::with('tipoNomina')->orderBy('id', 'desc')->get();
        return view('nominas.show_nomina', compact('nominas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = \App\Models\TipoNomina::all();
        return view('nominas.nomina', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // 1. Validar los datos de la cabecera
            $request->validate([
                'tipo_nomina_id' => 'required|exists:tipo_nominas,id',
                'descripcion'    => 'required|string|max:255',
                'fecha_desde'    => 'required|date',
                'fecha_hasta'    => 'required|date|after_or_equal:fecha_desde',
                'fecha_pago'     => 'required|date',
            ]);

            try {
                // INICIAMOS LA TRANSACCIÓN
                DB::beginTransaction();

                // 2. Crear la Cabecera de la Nómina
                $nomina = Nomina::create([
                    'tipo_nomina_id' => $request->tipo_nomina_id,
                    'descripcion'    => $request->descripcion,
                    'fecha_desde'    => $request->fecha_desde,
                    'fecha_hasta'    => $request->fecha_hasta,
                    'fecha_pago'     => $request->fecha_pago,
                    'estado'         => 'Abierta',
                ]);

                // 3. Buscar empleados activos que pertenezcan a ese tipo de nómina
                $empleados = Empleado::where('tipo_nomina_id', $request->tipo_nomina_id)
                                    ->where('situacion_laboral', 'Activo')
                                    ->get();

                // 4. Verificar si hay empleados
                if ($empleados->isEmpty()) {
                    throw new \Exception("No hay empleados activos asignados a este tipo de nómina.");
                }

                // 5. Generar los detalles por cada empleado (Copiado de sueldo maestro)
                foreach ($empleados as $emp) {
                    // Aquí podrías aplicar lógica de quincenas si lo deseas
                    // Por ahora capturamos el salario base completo
                    NominaDetalles::create([
                        'nomina_id'           => $nomina->id,
                        'empleado_id'         => $emp->id,
                        'sueldo_base_momento' => $emp->Salario, 
                        'total_asignaciones'  => 0, // Se llenará cuando proceses conceptos
                        'total_deducciones'   => 0,
                        'monto_neto'          => $emp->Salario,
                    ]);
                }

                // SI TODO SALIÓ BIEN, GUARDAMOS DEFINITIVAMENTE
                DB::commit();

                return redirect()->route('nominas.index')
                                ->with('success', 'Nómina generada exitosamente con ' . $empleados->count() . ' empleados.');

            } catch (\Exception $e) {
                // SI ALGO FALLÓ, DESHACEMOS TODO (Rollback)
                DB::rollBack();

                return back()->withErrors(['error' => 'Error al generar la nómina: ' . $e->getMessage()])
                            ->withInput();
            }
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
