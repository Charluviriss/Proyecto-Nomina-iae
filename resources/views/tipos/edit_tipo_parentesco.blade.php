@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Editar Tipo de Parentesco</h1>

    <form action="{{ route('tipo_parentesco.update', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo"
                   value="{{ old('codigo', $tipo->codigo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"
                   value="{{ old('descripcion', $tipo->descripcion) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('tipo_parentesco.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection