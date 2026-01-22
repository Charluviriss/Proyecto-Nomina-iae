@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm" style="max-width: 700px; margin: auto;">
        <div class="card-header bg-secondary text-white py-1">
            <h6 class="mb-0">Generar Nuevo Proceso de Nómina</h6>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('nominas.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label small fw-bold">Descripción del Proceso</label>
                        <input type="text" name="descripcion" class="form-control form-control-sm" placeholder="Ej: Primera Quincena Enero 2026" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label small fw-bold">Tipo de Nómina</label>
                        <select name="tipo_nomina_id" class="form-select form-select-sm" required>
                            <option value="">Seleccione...</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion_nomina }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Fecha Desde</label>
                        <input type="date" name="fecha_desde" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Fecha Hasta</label>
                        <input type="date" name="fecha_hasta" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Fecha de Pago</label>
                        <input type="date" name="fecha_pago" class="form-control form-control-sm" required>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end border-top pt-3">
                    <a href="{{ route('nominas.index') }}" class="btn btn-sm btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-sm btn-primary px-4">
                        <i class="fas fa-cogs"></i> Generar Nómina
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection