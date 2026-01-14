@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Registrar Nueva Nómina</h2>
    <form action="{{ route('tipo_nominas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion_nomina" class="form-label">Descripción de la Nómina</label>
            <input type="text" class="form-control" id="descripcion_nomina" name="descripcion_nomina" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('tipo_nominas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection