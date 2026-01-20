@extends('layouts.app') 

@section('content')
<div class="container mt-3">
    <div class="card shadow-lg">
        <div class="card-header bg-light">
            <h5 class="mb-0">Editar Empleado: {{ $empleado->nombres }} {{ $empleado->apellidos }}</h5>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item"><a class="nav-link active" href="#">Datos Generales</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Constantes</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Familiares</a></li>
            </ul>

            {{-- CAMBIO: Ruta update y ID del empleado --}}
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- CAMBIO: Necesario para actualizaciones en Laravel --}}

                {{-- BLOQUE SUPERIOR: DATOS PERSONALES --}}
                <div class="row border p-3 mb-3 m-1 bg-light rounded">
                    <div class="col-md-4">
                        <label class="form-label">Cédula:</label>
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                {{-- CAMBIO: Checked según nacionalidad --}}
                                <input type="radio" name="Nacionalidad" value="Venezolano" {{ $empleado->Nacionalidad == 'Venezolano' ? 'checked' : '' }}> V
                                <input type="radio" name="Nacionalidad" value="Extranjero" class="ms-2" {{ $empleado->Nacionalidad == 'Extranjero' ? 'checked' : '' }}> E
                            </div>
                            <input type="text" name="cedula" class="form-control" value="{{ $empleado->cedula }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Apellidos:</label>
                        <input type="text" name="apellidos" class="form-control mb-2" value="{{ $empleado->apellidos }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nombres:</label>
                        <input type="text" name="nombres" class="form-control mb-2" value="{{ $empleado->nombres }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sexo:</label>
                        <div class="d-block">
                            <input type="radio" name="sexo" value="Masculino" {{ $empleado->sexo == 'Masculino' ? 'checked' : '' }}> Masc.
                            <input type="radio" name="sexo" value="Femenino" class="ms-2" {{ $empleado->sexo == 'Femenino' ? 'checked' : '' }}> Fem.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Fecha Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $empleado->fecha_nacimiento }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lugar de Nac.:</label>
                        <input type="text" name="lugar" class="form-control" value="{{ $empleado->lugar }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Profesión:</label>
                        <select name="profesion_id" class="form-select">
                            <option value="">Seleccione...</option>
                            @foreach($profesiones as $prof)
                                <option value="{{ $prof->id }}" {{ $empleado->profesion_id == $prof->id ? 'selected' : '' }}>{{ $prof->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dirección:</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $empleado->direccion }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="form-label">E-Mail:</label>
                        <input type="email" name="email" class="form-control" value="{{ $empleado->email }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="form-label">Situación:</label>
                        <select name="situacion_laboral" class="form-select">
                            <option value="Nuevo" {{ $empleado->situacion_laboral == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                            <option value="Activo" {{ $empleado->situacion_laboral == 'Activo' ? 'selected' : '' }}>Activo</option>
                        </select>
                    </div>
                </div>

                <div class="row m-1">
                    {{-- BLOQUE IZQUIERDO: DATOS DE PAGO/CONTRATO --}}
                    <div class="col-md-6 border p-3 bg-light rounded shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ficha:</label>
                                <input type="text" name="ficha_Empleado" class="form-control mb-2" value="{{ $empleado->ficha_Empleado }}">
                            </div>
                            <div class="col-md-6">
                                <label>Fecha Ingreso:</label>
                                <input type="date" name="fecha_ingreso" class="form-control mb-2" value="{{ $empleado->fecha_ingreso }}">
                            </div>
                            <div class="col-12 mb-2">
                                <label>Prestaciones:</label>
                                <div class="d-block">
                                    <input type="radio" name="prestaciones" value="Fideicomiso" {{ $empleado->prestaciones == 'Fideicomiso' ? 'checked' : '' }}> Fideicomiso
                                    <input type="radio" name="prestaciones" value="Fondo" class="ms-2" {{ $empleado->prestaciones == 'Fondo' ? 'checked' : '' }}> Fondo
                                    <input type="radio" name="prestaciones" value="Contabilidad" class="ms-2" {{ $empleado->prestaciones == 'Contabilidad' ? 'checked' : '' }}> Contabilidad
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <label>Tipo Cobro:</label>
                                <select name="tipo_cobro" class="form-select">
                                    <option {{ $empleado->tipo_cobro == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                    <option {{ $empleado->tipo_cobro == 'Deposito Cta. Corriente' ? 'selected' : '' }}>Deposito Cta. Corriente</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Banco:</label>
                                <select name="grupo_banco_id" class="form-select mb-2">
                                    <option value="">Seleccione...</option>
                                    @foreach($grupo_bancos as $grupo)
                                        <option value="{{ $grupo->id }}" {{ $empleado->grupo_banco_id == $grupo->id ? 'selected' : '' }}>{{ $grupo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Cuenta:</label>
                                <input type="text" name="numero_cuenta" class="form-control" value="{{ $empleado->numero_cuenta }}">
                            </div>
                            <div class="col-12 mt-2">
                                <label>Tipo Contrato:</label><br>
                                <input type="radio" name="tipo_contrato" value="Fijo" {{ $empleado->tipo_contrato == 'Fijo' ? 'checked' : '' }}> Fijo
                                <input type="radio" name="tipo_contrato" value="Temporal" class="ms-2" {{ $empleado->tipo_contrato == 'Temporal' ? 'checked' : '' }}> Temporal
                                <input type="radio" name="tipo_contrato" value="Contratado" class="ms-2" {{ $empleado->tipo_contrato == 'Contratado' ? 'checked' : '' }}> Contratado
                            </div>
                            <div class="col-12 mt-3">
                                <label>Sueldo o Salario:</label>
                                <input type="number" step="0.01" name="Salario" class="form-control text-end" value="{{ $empleado->Salario }}">
                            </div>
                        </div>
                    </div>

                    {{-- BLOQUE DERECHO: DATOS ORGANIZACIONALES --}}
                    <div class="col-md-6 border p-3 bg-light rounded shadow-sm">
                        <div class="mb-3">
                            <label>Nómina:</label>
                            <select name="tipo_nomina_id" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach($tipo_nominas as $tipo)
                                    <option value="{{ $tipo->id }}" {{ $empleado->tipo_nomina_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->descripcion_nomina }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Presupuesto:</label>
                            <select name="presupuesto_id" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach($presupuestos as $pres)
                                    <option value="{{ $pres->id }}" {{ $empleado->presupuesto_id == $pres->id ? 'selected' : '' }}>{{ $pres->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Direcciones:</label>
                            <select name="direccion_id" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach($direcciones as $dir)
                                    <option value="{{ $dir->id }}" {{ $empleado->direccion_id == $dir->id ? 'selected' : '' }}>{{ $dir->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Departamento:</label>
                            <select name="departamento_id" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach($departamentos as $dep)
                                    <option value="{{ $dep->id }}" {{ $empleado->departamento_id == $dep->id ? 'selected' : '' }}>{{ $dep->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Categoría:</label>
                                <select name="categoria_id" class="form-select">
                                    <option value="">Seleccione...</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ $empleado->categoria_id == $cat->id ? 'selected' : '' }}>{{ $cat->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Cargo:</label>
                                <select name="cargo_id" class="form-select">
                                    <option value="">Seleccione...</option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{ $cargo->id }}" {{ $empleado->cargo_id == $cargo->id ? 'selected' : '' }}>{{ $cargo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end border-top pt-3">
                    <button type="submit" class="btn btn-warning me-2">💾 Actualizar Cambios</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-danger">❌ Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection