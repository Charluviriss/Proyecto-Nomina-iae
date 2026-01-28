<!-- resources/views/profesiones/categorias/Tabulaciones_categorias.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tabulaciones - Categorías</h1>

    <div class="mb-3">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">+ Agregar Nueva Categoría</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Campo Grupo</th>
                <th>Salario</th>
                <th>Bono Mes</th>
                <th>Bono Día</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->campo_grupo }}</td>
                <td>{{ $categoria->salario }}</td>
                <td>{{ $categoria->bono_mes }}</td>
                <td>{{ $categoria->bono_dia }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection