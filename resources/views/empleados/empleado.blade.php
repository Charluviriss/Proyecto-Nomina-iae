@extends('layouts.app') 

@section('content')
<div class="container mt-3">
    <div class="card shadow-lg">
        <div class="card-header bg-light">
            <h5 class="mb-0">Datos Básicos (Nuevo)</h5>
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
            {{-- Pestañas simuladas (Solo Datos Generales activa) --}}
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Datos Generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Constantes (Campos Adicionales)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Familiares</a>
                </li>
            </ul>

            <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- BLOQUE SUPERIOR: DATOS PERSONALES --}}
                <div class="row border p-3 mb-3 m-1 bg-light rounded">
                    <div class="col-md-4">
                        <label class="form-label">Cédula:</label>
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                <input type="radio" name="Nacionalidad" value="Venezolano" checked> V
                                <input type="radio" name="Nacionalidad" value="Extranjero" class="ms-2"> E
                            </div>
                            <input type="text" name="cedula" class="form-control" placeholder="Número de cédula">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Apellidos:</label>
                        <input type="text" name="apellidos" class="form-control mb-2">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nombres:</label>
                        <input type="text" name="nombres" class="form-control mb-2">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sexo:</label>
                        <div class="d-block">
                            <input type="radio" name="sexo" value="Masculino"> Masc.
                            <input type="radio" name="sexo" value="Femenino" class="ms-2"> Fem.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Fecha Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lugar de Nac.:</label>
                        <input type="text" name="lugar" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Profesión:</label>
                        <select name="profesion_id" class="form-select">
                            @foreach($profesiones as $prof)
                                <option value="{{ $prof->id }}">{{ $prof->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dirección:</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="form-label">E-Mail:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="form-label">Situación:</label>
                        <select name="situacion_Laboal" class="form-select">
                            <option value="Nuevo">Nuevo</option>
                            <option value="Activo">Activo</option>
                        </select>
                    </div>
                </div>

                <div class="row m-1">
                    {{-- BLOQUE IZQUIERDO: DATOS DE PAGO/CONTRATO --}}
                    <div class="col-md-6 border p-3 bg-light rounded shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ficha:</label>
                                <input type="text" name="ficha_Empleado" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label>Fecha Ingreso:</label>
                                <input type="date" name="fecha_ingreso" class="form-control mb-2">
                            </div>
                            <div class="col-12 mb-2">
                                <label>Prestaciones:</label>
                                <div class="d-block">
                                    <input type="radio" name="prestaciones" value="Fideicomiso"> Fideicomiso
                                    <input type="radio" name="prestaciones" value="Fondo" class="ms-2"> Fondo
                                    <input type="radio" name="prestaciones" value="Contabilidad" class="ms-2" checked> Contabilidad
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <label>Tipo Cobro:</label>
                                <select name="tipo_cobro" class="form-select">
                                    <option>Efectivo</option>
                                    <option>Deposito Cta. Corriente</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Banco:</label>
                                <select name="banco_id" class="form-select mb-2">
                                    @foreach($grupo_bancos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Cuenta:</label>
                                <input type="text" name="numero_cuenta" class="form-control">
                            </div>
                            <div class="col-12 mt-2">
                                <label>Tipo Contrato:</label><br>
                                <input type="radio" name="tipo_contrato" value="Fijo" checked> Fijo
                                <input type="radio" name="tipo_contrato" value="Temporal" class="ms-2"> Temporal
                                <input type="radio" name="tipo_contrato" value="Contratado" class="ms-2"> Contratado
                            </div>
                            <div class="col-12 mt-3">
                                <label>Sueldo o Salario:</label>
                                <input type="number" step="0.01" name="Salario" class="form-control text-end" value="0.00">
                            </div>
                        </div>
                    </div>

                    {{-- BLOQUE DERECHO: DATOS ORGANIZACIONALES --}}
                    <div class="col-md-6 border p-3 bg-light rounded shadow-sm">
                        <div class="mb-3">
                            <label>Nómina:</label>
                            <select name="tipo_nomina_id" class="form-select">
                                @foreach($tipo_nominas as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion_nomina }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Presupuesto:</label>
                            <select name="presupuesto_id" class="form-select">
                                @foreach($presupuestos as $pres)
                                    <option value="{{ $pres->id }}">{{ $pres->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Direcciones:</label>
                            <select name="direccion_id" class="form-select">
                                @foreach($direcciones as $dir)
                                    <option value="{{ $dir->id }}">{{ $dir->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Departamento:</label>
                            <select name="departamento_id" class="form-select">
                                @foreach($departamentos as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Categoría:</label>
                                <select name="categoria_id" class="form-select">
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Cargo:</label>
                                <select name="cargo_id" class="form-select">
                                    @foreach($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BOTONES INFERIORES --}}
                <div class="mt-4 d-flex justify-content-end border-top pt-3">
                    <button type="submit" class="btn btn-warning me-2">👍 Aceptar</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-danger">❌ Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection