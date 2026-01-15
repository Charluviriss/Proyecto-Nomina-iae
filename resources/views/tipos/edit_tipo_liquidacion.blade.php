@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Tipo de Liquidación: {{ $tipo->codigo }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_Liquidacion.update', $tipo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $tipo->codigo }}" required maxlength="50">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $tipo->descripcion }}" required maxlength="255">
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success w-100">Actualizar</button>
                            <a href="{{ route('tipo_Liquidacion.index') }}" class="btn btn-secondary w-100">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
