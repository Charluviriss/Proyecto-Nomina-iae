@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="width: 28rem;">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0 small"><i class="bi bi-calendar-range"></i> Configuración de Feriados</h5>
        </div>
        <div class="card-body p-4 bg-light">
            <h6 class="text-center fw-bold mb-3 border-bottom pb-2">Seleccione el día actualizar</h6>
            
            <form action="{{ route('calendarios.index') }}" method="GET">
                <div class="row row-cols-2 g-3 mb-4 ps-3">
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="lunes" name="days[]" value="1">
                            <label class="form-check-label" for="lunes">Lunes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="viernes" name="days[]" value="5">
                            <label class="form-check-label" for="viernes">Viernes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="martes" name="days[]" value="2">
                            <label class="form-check-label" for="martes">Martes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="sabado" name="days[]" value="6" checked>
                            <label class="form-check-label" for="sabado">Sábado</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="miercoles" name="days[]" value="3">
                            <label class="form-check-label" for="miercoles">Miércoles</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="domingo" name="days[]" value="0" checked>
                            <label class="form-check-label" for="domingo">Domingo</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="jueves" name="days[]" value="4">
                            <label class="form-check-label" for="jueves">Jueves</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3 border-top pt-3">
                    <button type="submit" class="btn btn-success d-flex align-items-center px-4">
                        <i class="bi bi-hand-thumbs-up me-2"></i> Aceptar
                    </button>
                    <a href="{{ route('calendarios.index') }}" class="btn btn-danger d-flex align-items-center px-4">
                        <i class="bi bi-x-circle me-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
        <div class="card-footer text-center bg-white border-top-0 pb-3">
             <a href="{{ route('calendarios.index') }}" class="text-decoration-none text-muted small">
                <i class="bi bi-door-closed me-1"></i> Cerrar
             </a>
        </div>
    </div>
</div>
@endsection
