@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Registrar Nueva Frecuencia de Pago</h2>
    <form action="{{ route('tipo_frecuencia_pagos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion_frecuencia" class="form-label">Descripción de la Frecuencia</label>
            <input type="text" class="form-control" id="descripcion_frecuencia" name="descripcion_frecuencia" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('tipo_frecuencia_pagos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection