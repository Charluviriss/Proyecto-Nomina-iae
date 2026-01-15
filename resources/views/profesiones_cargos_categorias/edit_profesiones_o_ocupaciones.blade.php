<!-- resources/views/profesiones/edit_profesiones_o_ocupaciones.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Editar Profesión u Ocupación</h1>

    <form method="POST" action="{{ route('profesiones_o_ocupaciones.update', $profesion->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo"
                   value="{{ old('codigo', $profesion->codigo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"
                   value="{{ old('descripcion', $profesion->descripcion) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('profesiones_o_ocupaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection