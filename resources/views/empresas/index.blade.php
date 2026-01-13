@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Información de la Empresa</h3>
            <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-light btn-sm">
                <i class="fas fa-edit"></i> Editar Información
            </a>
        </div>
        <div class="card-body bg-light">
            {{-- Usamos la misma estructura de filas del CREATE --}}
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Código:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->codigo }}" readonly>
                </div>
                <div class="col-md-4 ms-md-4"> 
                    <label class="form-label fw-bold">Nro. Serial:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->nro_serial }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-10">
                    <label class="form-label fw-bold">Nombre de la Empresa:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->nombre }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Identificador 1:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->identificador_1 }}" readonly>
                </div>
                <div class="col-md-4 ms-md-4">
                    <label class="form-label fw-bold">Identificador 2:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->identificador_2 }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-10">
                    <label class="form-label fw-bold">Dirección Fiscal:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->direccion }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label fw-bold">Ciudad:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->ciudad }}" readonly>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold">Estado / Departamento:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->estado_departamento }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label fw-bold">Zona Postal:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->zona_postal }}" readonly>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold">Teléfono:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->telefono }}" readonly>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-5">
                    <label class="form-label fw-bold">Representante Legal:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->representante }}" readonly>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold">Encargado de RRHH:</label>
                    <input type="text" class="form-control-plaintext border-bottom" value="{{ $empresa->encargado_rrhh }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection