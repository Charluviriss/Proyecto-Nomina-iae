<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Profesiones;
use App\Models\GrupoBanco;
use App\Models\TipoNomina;
use App\Models\Presupuesto;
use App\Models\Direcciones;
use App\Models\Departamento;
use App\Models\Categorias;
use App\Models\Cargos;



class EmpleadoController extends Controller
{
    /**
     * Muestra la lista de empleados organizada por pestañas.
     * Redirecciona a empleados.show_empleado
     */
    public function index(Request $request)
    {
        // Obtenemos el filtro de la pestaña actual, por defecto 'Activo'
        $situacion = $request->get('situacion', 'Activo');

        // Consultamos los empleados según la situación para la tabla principal
        $empleados = Empleado::where('situacion_laboral', $situacion)->get();

        // Contamos el total para el indicador que sale en tu foto (Total Personal)
        $totalPersonal = Empleado::count();

        return view('empleados.show_empleado', compact('empleados', 'situacion', 'totalPersonal'));
    }

    /**
     * Muestra el formulario para agregar un nuevo empleado.
     * Redirecciona a empleados.empleado
     */
    public function create()
    {
        // Aquí deberías cargar las tablas maestras para los selects del formulario
        // Ej: $cargos = Cargo::all();
        // Consultamos toda la información de las tablas de configuración
        $profesiones = Profesiones::orderBy('descripcion', 'asc')->get();
        $grupo_bancos = GrupoBanco::orderBy('descripcion', 'asc')->get();
        $tipo_nominas = TipoNomina::all();
        $presupuestos = Presupuesto::all();
        $direcciones = Direcciones::all();
        $departamentos = Departamento::all();
        $categorias = Categorias::all();
        $cargos = Cargos::orderBy('descripcion', 'asc')->get();

        // Pasamos todas las variables a la vista 'empleados.empleado'
        return view('empleados.empleado', compact(
            'profesiones', 
            'grupo_bancos', 
            'tipo_nominas', 
            'presupuestos', 
            'direcciones', 
            'departamentos', 
            'categorias', 
            'cargos'
        ));
    }

    /**
     * Guarda el empleado en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación: Asegúrate de que los nombres coincidan con los 'name' de los inputs
        $request->validate([
            'cedula' => 'required|unique:empleados,cedula',
            'apellidos' => 'required',
            'nombres' => 'required',
            'ficha_Empleado' => 'required|unique:empleados,ficha_Empleado', // Obligatorio por tu migración
            
        ]);

        try {
            // Usamos el modelo con los nombres exactos de la MIGRACIÓN
            Empleado::create([
                'Nacionalidad'      => $request->Nacionalidad,
                'cedula'            => $request->cedula,
                'apellidos'         => $request->apellidos,
                'nombres'           => $request->nombres,
                'sexo'              => $request->sexo,
                'fecha_nacimiento'  => $request->fecha_nacimiento,
                'lugar'             => $request->lugar,
                'profesion_id'      => $request->profesion_id,
                'direccion'         => $request->direccion,
                'telefono'          => $request->telefono,
                'email'             => $request->email,
                // CORRECCIÓN AQUÍ: nombre exacto de la tabla
                'situacion_laboral' => $request->situacion_Laboal ?? 'Nuevo', 
                
                'ficha_Empleado'    => $request->ficha_Empleado,
                'fecha_ingreso'     => $request->fecha_ingreso,
                'prestaciones'      => $request->prestaciones,
                'tipo_cobro'        => $request->tipo_cobro,
                'grupo_banco_id'    => $request->banco_id, // Cambiado para coincidir con tu migración
                'numero_cuenta'     => $request->numero_cuenta,
                'grupo_banco_auxiliar_id' => $request->banco_auxiliar_id, // Cambiado
                'numero_cuenta_auxiliar' => $request->numero_cuenta_auxiliar,
                'tipo_contrato'     => $request->tipo_contrato ?? 'Fijo',
                'Salario'           => $request->Salario ?? 0,

                'tipo_nomina_id'    => $request->tipo_nomina_id,
                'presupuesto_id'    => $request->presupuesto_id,
                'direccion_id'      => $request->direccion_id,
                'departamento_id'   => $request->departamento_id,
                'categoria_id'      => $request->categoria_id,
                'cargo_id'          => $request->cargo_id,
            ]);

            return redirect()->route('empleados.index')->with('success', 'Empleado creado');

        } catch (\Exception $e) {
            // IMPORTANTE: Esto te mostrará el error real en pantalla si algo falla
            return back()->withErrors(['db_error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Muestra el formulario para editar.
     * Redirecciona a empleados.edit_empleado
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
    
        // Necesitamos cargar todas las listas de nuevo para los selects
        $profesiones = Profesiones::all();
        $cargos = Cargos::all();
        $departamentos = Departamento::all();
        $tipo_nominas = TipoNomina::all();
        $presupuestos = Presupuesto::all();
        $direcciones = Direcciones::all();
        $grupo_bancos = GrupoBanco::all();
        $categorias = Categorias::all();
        // ... carga aquí el resto (departamentos, nóminas, etc.)

        return view('empleados.edit_empleado', compact('empleado', 'profesiones', 'cargos', 'departamentos', 'tipo_nominas', 'presupuestos', 'direcciones', 'grupo_bancos', 'categorias'));
    }

    /**
     * Actualiza los datos del empleado.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        // Usamos la misma lógica que en el store para asegurar los nombres de las columnas
        $empleado->update([
            'Nacionalidad' => $request->Nacionalidad,
            'cedula' => $request->cedula,
            'apellidos' => $request->apellidos,
            'nombres' => $request->nombres,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'lugar' => $request->lugar,
            'profesion_id' => $request->profesion_id,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'situacion_laboral' => $request->situacion_laboral,
            'ficha_Empleado' => $request->ficha_Empleado,
            'fecha_ingreso' => $request->fecha_ingreso,
            'prestaciones' => $request->prestaciones,
            'tipo_cobro' => $request->tipo_cobro,
            'grupo_banco_id' => $request->grupo_banco_id,
            'numero_cuenta' => $request->numero_cuenta,
            'tipo_contrato' => $request->tipo_contrato,
            'Salario' => $request->Salario,
            'tipo_nomina_id' => $request->tipo_nomina_id,
            'presupuesto_id' => $request->presupuesto_id,
            'direccion_id' => $request->direccion_id,
            'departamento_id' => $request->departamento_id,
            'categoria_id' => $request->categoria_id,
            'cargo_id' => $request->cargo_id,
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Elimina (o desactiva) un empleado.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado');
    }
}
