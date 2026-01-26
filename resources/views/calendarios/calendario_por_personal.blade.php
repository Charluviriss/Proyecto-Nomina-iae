@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg" style="width: 800px; background-color: #e0e0e0; border: 1px solid #999;">
        <div class="card-header bg-white border-bottom-0 py-1 ps-2">
            <span class="small fw-bold text-secondary">Personalizando Calendario</span>
        </div>
        <div class="card-body p-4" style="background-color: #d6d6d6;">
            
            <form action="{{ route('calendarios.show') }}" method="GET">
                <div class="row g-3">
                    {{-- Left Side: Controls --}}
                    <div class="col-md-9">
                        {{-- Ficha Row --}}
                        <div class="row align-items-center mb-3">
                            <label for="ficha" class="col-auto col-form-label fw-bold small text-end" style="width: 80px;">Ficha:</label>
                            <div class="col-auto">
                                <input type="text" id="ficha" name="ficha" class="form-control form-control-sm border-secondary rounded-0" value="" style="width: 100px;">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-outline-dark rounded-0 px-2 py-0 border-0 fw-bold small" style="background: none; text-decoration: underline;">F2</button>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control-plaintext form-control-sm fw-bold" value="" readonly>
                            </div>
                        </div>

                        {{-- Año Row --}}
                        <div class="row align-items-center mb-4">
                            <label for="year" class="col-auto col-form-label fw-bold small text-end" style="width: 80px;">Año:</label>
                            <div class="col-auto">
                                <input type="number" id="year" name="year" class="form-control form-control-sm border-secondary rounded-0" value="{{ date('Y') }}" min="1900" max="2100" style="width: 80px;">
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="row">
                            <div class="col-auto offset-md-1 ms-4 d-grid gap-2">
                                <button type="submit" class="btn btn-light border border-secondary rounded-0 text-start px-3 shadow-sm btn-sm" style="min-width: 160px;">
                                    <span class="me-2 small fw-bold">F3</span> Ver Calendario
                                </button>
                                <a href="{{ route('calendarios.feriados') }}" class="btn btn-light border border-secondary rounded-0 text-start px-3 shadow-sm btn-sm" style="min-width: 160px;">
                                    <span class="me-2 small fw-bold">F4</span> Feriados
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side: Profile Image Placeholder --}}
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <div class="bg-light border border-secondary shadow-inner" style="width: 120px; height: 120px; background-color: #dadada;"></div>
                    </div>
                </div>
            </form>

        </div>

        {{-- Footer / Navigation --}}
        <div class="card-footer border-top border-secondary p-3 d-flex justify-content-between align-items-center" style="background-color: #d6d6d6;">
            
            {{-- Navigation Buttons --}}
            <div class="btn-group shadow-sm" role="group">
                <button type="button" class="btn btn-light border border-secondary rounded-0 btn-sm px-3" title="Anterior (F5)">
                    <i class="bi bi-rewind-fill"></i> <span class="d-none d-sm-inline ms-1 small fw-bold">Anterior <small class="text-muted ms-1">F5</small></span>
                </button>
                <button type="button" class="btn btn-light border border-secondary rounded-0 btn-sm px-3" title="Próximo (F6)">
                    <span class="d-none d-sm-inline me-1 small fw-bold">Próximo <small class="text-muted ms-1">F6</small></span> <i class="bi bi-fast-forward-fill"></i>
                </button>
            </div>

            {{-- Close Button --}}
            <a href="{{ url('/') }}" class="btn btn-light border border-secondary rounded-0 shadow-sm btn-sm px-4">
                <i class="bi bi-door-open-fill me-1"></i> Cerrar
            </a>
        </div>
    </div>
    
    {{-- Watermark / Logo area --}}
    <div class="position-absolute bottom-0 end-0 p-4 opacity-50">
        <h3 class="fw-bold text-secondary fst-italic display-6">NOMINA</h3>
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
        // F5 prevents refresh usually, be careful
        if (event.key === 'F5') {
            event.preventDefault();
            console.log('Anterior triggered');
        }
        if (event.key === 'F6') {
            event.preventDefault();
            console.log('Siguiente triggered');
        }
    });

    // Auto-focus on Ficha input
    document.getElementById('ficha').focus();
</script>

<style>
    /* Custom shadow helper for inset look */
    .shadow-inner {
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }
</style>
@endsection
