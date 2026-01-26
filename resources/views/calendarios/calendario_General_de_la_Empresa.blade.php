@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg" style="width: 25rem; background-color: #f8f9fa;">
        <div class="card-header bg-dark text-white text-center">
            <h5 class="mb-0">Calendario General de la Empresa</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('calendarios.show') }}" method="GET">
                <div class="row mb-4 align-items-center justify-content-center">
                    <div class="col-auto">
                        <label for="year" class="form-label fw-bold mb-0">Año:</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="year" name="year" class="form-control text-center fw-bold" value="{{ date('Y') }}" min="1900" max="2100" style="width: 120px; font-size: 1.2rem;">
                    </div>
                </div>

                <div class="d-grid gap-3">
                    <button type="submit" class="btn btn-primary d-flex justify-content-between align-items-center px-4 py-2">
                        <span><i class="bi bi-calendar-check me-2"></i> Ver Calendario</span>
                        <span class="badge bg-light text-primary border border-primary">F3</span>
                    </button>
                    
                    <a href="{{ route('calendarios.feriados') }}" class="btn btn-info text-white d-flex justify-content-between align-items-center px-4 py-2">
                        <span><i class="bi bi-calendar-week me-2"></i> Feriados</span>
                        <span class="badge bg-light text-info border border-info">F4</span>
                    </a>

                    <a href="{{ url('/') }}" class="btn btn-secondary d-flex justify-content-between align-items-center px-4 py-2 mt-2">
                        <span><i class="bi bi-x-circle me-2"></i> Cerrar</span>
                        <span class="badge bg-light text-secondary border border-secondary">Esc</span>
                    </a>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center small">
            Sistema de Gestión de Nómina
        </div>
    </div>
</div>

<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F3') {
            event.preventDefault();
            document.querySelector('button[type="submit"]').click();
        }
        if (event.key === 'F4') {
            event.preventDefault();
            document.querySelector('a[href*="feriados"]').click();
        }
        if (event.key === 'Escape') {
            event.preventDefault();
            document.querySelector('a[href="{{ url('/') }}"]').click();
        }
    });

    // Auto-focus on Year input
    document.getElementById('year').focus();
</script>

<style>
    /* Add Bootstrap Icons if not present */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css");
</style>
@endsection
