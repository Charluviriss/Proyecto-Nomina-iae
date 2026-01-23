@extends('layouts.app') 

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="text-center">
        <h1 class="mb-4 fw-bold text-secondary">Sistema de Gestión de Nómina</h1>
        <p class="text-muted mb-5">Seleccione el módulo al que desea ingresar</p>

        <div class="d-flex gap-4 justify-content-center">
            
            {{-- Botón Módulo de Empleados --}}
            <a href="{{ route('empleados.index') }}" class="card shadow-sm text-decoration-none btn-outline-primary" style="width: 250px; transition: transform 0.2s;">
                <div class="card-body py-5">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title fw-bold text-dark">Gestión de Personal</h5>
                    <p class="card-text small text-muted">Registros, expedientes y listados de empleados.</p>
                </div>
            </a>

            {{-- Botón Módulo de Nóminas --}}
            <a href="{{ route('nominas.index') }}" class="card shadow-sm text-decoration-none btn-outline-success" style="width: 250px; transition: transform 0.2s;">
                <div class="card-body py-5">
                    <i class="fas fa-file-invoice-dollar fa-3x mb-3 text-success"></i>
                    <h5 class="card-title fw-bold text-dark">Procesos de Nómina</h5>
                    <p class="card-text small text-muted">Generación de pagos, recibos e historial.</p>
                </div>
            </a>

        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        border-color: #0d6efd;
    }
</style>
@endsection