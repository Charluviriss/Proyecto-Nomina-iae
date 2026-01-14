@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Constante: {{ $constante->codigo }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('constantes_formulas.update', $constante->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $constante->codigo }}" required>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="etiqueta" class="form-label">Etiqueta:</label>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $constante->etiqueta }}" required>
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Tipo Campo:</label>
                        <div class="d-flex gap-3 pt-2">
                            @foreach(['Alfanumérico', 'Numérico', 'Fecha'] as $tipo)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_campo" id="edit_tipo_{{ $loop->index }}" value="{{ $tipo }}" {{ $constante->tipo_campo == $tipo ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_tipo_{{ $loop->index }}">{{ $tipo }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="{{ $constante->valor }}">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success px-4">Actualizar Constante</button>
                    <a href="{{ route('constantes_formulas.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
