@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Campo Concepto</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('adicionales_conceptos.update', $adicional->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="nro_constante" class="form-label">Nro. Constante:</label>
                        <input type="text" class="form-control" id="nro_constante" name="nro_constante" value="{{ $adicional->nro_constante }}" maxlength="10" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $adicional->descripcion }}" maxlength="255" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="etiqueta" class="form-label">Etiqueta:</label>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $adicional->etiqueta }}" maxlength="255" required>
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Tipo Dato:</label>
                        <div class="d-flex gap-3 pt-2">
                            @foreach(['Alfanumérico', 'Numérico', 'Fecha', 'Tablas'] as $tipo)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_dato" id="tipo_{{ $loop->index }}" value="{{ $tipo }}" {{ $adicional->tipo_dato == $tipo ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tipo_{{ $loop->index }}">{{ $tipo }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="{{ $adicional->valor }}" maxlength="255">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success px-4">Actualizar Registro</button>
                    <a href="{{ route('adicionales_conceptos.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
