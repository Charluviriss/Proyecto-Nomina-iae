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
        // 1. Validación básica (solo lo mínimo indispensable para no romper la BD)
        // El resto de los campos los dejamos libres como pediste.
        $request->validate([
            'cedula' => 'required|unique:empleados,cedula',
            'apellidos' => 'required',
            'nombres' => 'required',
            'email' => 'nullable|email|unique:empleados,email',
        ]);

        // 2. Creación del registro
        // Usamos $request->all() porque en el modelo pusimos protected $guarded = [];
        // Esto permite que Laravel asocie cada nombre del input con la columna de la BD.
        try {
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
                'situacion_Laboal'  => $request->situacion_Laboal ?? 'Nuevo',
                'foto_empleado'     => null, // Por ahora lo dejamos vacío
                
                'ficha_Empleado'    => $request->ficha_Empleado,
                'fecha_ingreso'     => $request->fecha_ingreso,
                'prestaciones'      => $request->prestaciones,
                'tipo_cobro'        => $request->tipo_cobro,
                'banco_id'          => $request->banco_id,
                'numero_cuenta'     => $request->numero_cuenta,
                'banco_auxiliar_id' => $request->banco_auxiliar_id,
                'numero_cuenta_auxiliar' => $request->numero_cuenta_auxiliar,
                'tipo_contrato'     => $request->tipo_contrato,
                'Salario'           => $request->Salario ?? 0,

                'tipo_nomina_id'    => $request->tipo_nomina_id,
                'presupuesto_id'    => $request->presupuesto_id,
                'direccion_id'      => $request->direccion_id,
                'departamento_id'   => $request->departamento_id,
                'categoria_id'      => $request->categoria_id,
                'cargo_id'          => $request->cargo_id,
            ]);

            return redirect()->route('empleados.index')
                            ->with('success', 'Empleado guardado correctamente.');

        } catch (\Exception $e) {
            // En caso de error (por ejemplo, una llave foránea que no existe)
            return back()->withInput()->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    /**
     * Muestra el formulario para editar.
     * Redirecciona a empleados.edit_empleado
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit_empleado', compact('empleado'));
    }

    /**
     * Actualiza los datos del empleado.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Datos actualizados');
    }

    /**
     * Elimina (o desactiva) un empleado.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
