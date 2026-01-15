@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Frecuencia: {{ $tipoFrecuenciaPago->id }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_frecuencia_pagos.update', $tipoFrecuenciaPago->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row align-items-end">
                    <div class="col-md-9 mb-3">
                        <label for="descripcion_frecuencia" class="form-label">Descripción de la Frecuencia:</label>
                        <input type="text" class="form-control" id="descripcion_frecuencia" name="descripcion_frecuencia" value="{{ $tipoFrecuenciaPago->descripcion_frecuencia }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success w-100">Actualizar</button>
                            <a href="{{ route('tipo_frecuencia_pagos.index') }}" class="btn btn-secondary w-100">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection