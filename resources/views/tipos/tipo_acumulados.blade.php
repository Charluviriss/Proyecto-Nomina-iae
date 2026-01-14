@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Registrar Nuevo Acumulado</h2>
    <form action="{{ route('tipo_acumulados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion_tipo" class="form-label">Tipo de Acumulado</label>
            <input type="text" class="form-control" id="descripcion_tipo" name="descripcion_tipo" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="descripcion_acumulados" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion_acumulados" name="descripcion_acumulados" required maxlength="100">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('tipo_acumulados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection