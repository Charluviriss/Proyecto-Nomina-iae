<!-- resources/views/profesiones/cargos/create_cargos.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Cargo</h2>
    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
