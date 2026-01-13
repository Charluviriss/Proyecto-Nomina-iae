@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Editar Empresa: {{ $empresa->nombre }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empresas.update', $empresa) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- CAMPOS BLOQUEADOS --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label text-muted">Código (No editable):</label>
                        <input type="text" name="codigo" class="form-control bg-light" value="{{ $empresa->codigo }}" readonly>
                    </div>
                    <div class="col-md-4 ms-md-4"> 
                        <label class="form-label text-muted">Nro. Serial (No editable):</label>
                        <input type="text" name="nro_serial" class="form-control bg-light" value="{{ $empresa->nro_serial }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label text-muted">Nombre (No editable):</label>
                        <input type="text" name="nombre" class="form-control bg-light" value="{{ $empresa->nombre }}" readonly>
                    </div>
                </div>

                <hr>

                {{-- CAMPOS EDITABLES --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Identificador 1:</label>
                        <input type="text" name="identificador_1" class="form-control" value="{{ old('identificador_1', $empresa->identificador_1) }}">
                    </div>
                    <div class="col-md-4 ms-md-4">
                        <label class="form-label">Identificador 2:</label>
                        <input type="text" name="identificador_2" class="form-control" value="{{ old('identificador_2', $empresa->identificador_2) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label">Dirección Fiscal:</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $empresa->direccion) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Ciudad:</label>
                        <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad', $empresa->ciudad) }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Estado / Departamento:</label>
                        <input type="text" name="estado_departamento" class="form-control" value="{{ old('estado_departamento', $empresa->estado_departamento) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Zona Postal:</label>
                        <input type="text" name="zona_postal" class="form-control" value="{{ old('zona_postal', $empresa->zona_postal) }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $empresa->telefono) }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-5">
                        <label class="form-label">Representante Legal:</label>
                        <input type="text" name="representante" class="form-control" value="{{ old('representante', $empresa->representante) }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Encargado de RRHH:</label>
                        <input type="text" name="encargado_rrhh" class="form-control" value="{{ old('encargado_rrhh', $empresa->encargado_rrhh) }}">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection