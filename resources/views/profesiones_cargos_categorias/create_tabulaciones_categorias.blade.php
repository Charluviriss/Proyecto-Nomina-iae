<!-- resources/views/profesiones/categorias/create_tabulaciones_categorias.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Categoría</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="campo_grupo" class="form-label">Campo Grupo</label>
            <input type="text" class="form-control" id="campo_grupo" name="campo_grupo" required>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="text" class="form-control" id="salario" name="salario" required>
        </div>

        <div class="mb-3">
            <label for="bono_mes" class="form-label">Bono Mes</label>
            <input type="text" class="form-control" id="bono_mes" name="bono_mes" required>
        </div>

        <div class="mb-3">
            <label for="bono_dia" class="form-label">Bono Día</label>
            <input type="text" class="form-control" id="bono_dia" name="bono_dia" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection