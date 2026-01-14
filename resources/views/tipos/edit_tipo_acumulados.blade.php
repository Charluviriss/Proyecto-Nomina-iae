@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Acumulado: {{ $tipoAcumulado->descripcion_tipo }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_acumulados.update', $tipoAcumulado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label for="descripcion_tipo" class="form-label">Tipo de Acumulado:</label>
                        <input type="text" class="form-control" id="descripcion_tipo" name="descripcion_tipo" value="{{ $tipoAcumulado->descripcion_tipo }}" required maxlength="20">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="descripcion_acumulados" class="form-label">Descripción Detallada:</label>
                        <input type="text" class="form-control" id="descripcion_acumulados" name="descripcion_acumulados" value="{{ $tipoAcumulado->descripcion_acumulados }}" required maxlength="100">
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success w-100">Actualizar</button>
                            <a href="{{ route('tipo_acumulados.index') }}" class="btn btn-secondary w-100">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection