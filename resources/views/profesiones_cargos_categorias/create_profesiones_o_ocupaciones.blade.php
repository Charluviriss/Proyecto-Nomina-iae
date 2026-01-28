<!-- resources/views/profesiones/create_profesiones_o_ocupaciones.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Crear Profesión u Ocupación</h1>

    <form method="POST" action="{{ route('profesiones_o_ocupaciones.store') }}">
        @csrf

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a href="{{ route('profesiones_o_ocupaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
