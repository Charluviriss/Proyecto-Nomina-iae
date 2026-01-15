<!-- resources/views/profesiones/categorias/edit_tabulaciones_categorias.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Categoría</h2>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="campo_grupo" class="form-label">Campo Grupo</label>
            <input type="text" class="form-control" id="campo_grupo" name="campo_grupo"
                   value="{{ old('campo_grupo', $categoria->campo_grupo) }}" required>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="text" class="form-control" id="salario" name="salario"
                   value="{{ old('salario', $categoria->salario) }}" required>
        </div>

        <div class="mb-3">
            <label for="bono_mes" class="form-label">Bono Mes</label>
            <input type="text" class="form-control" id="bono_mes" name="bono_mes"
                   value="{{ old('bono_mes', $categoria->bono_mes) }}" required>
        </div>

        <div class="mb-3">
            <label for="bono_dia" class="form-label">Bono Día</label>
            <input type="text" class="form-control" id="bono_dia" name="bono_dia"
                   value="{{ old('bono_dia', $categoria->bono_dia) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection