@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Tipos de Préstamos</h1>

    {{-- Botón para ir a la vista de creación --}}
    <a href="{{ route('tipos.create') }}" class="btn btn-success mb-3">
        + Registrar Nuevo Tipo de Préstamo
    </a>

    {{-- Mostrar mensajes flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if($tipos->isEmpty())
        <div class="alert alert-warning">
            Aún no hay tipos de préstamos registrados.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td>{{ $tipo->codigo }}</td>
                    <td>{{ $tipo->descripcion }}</td>
                    <td>
                        {{-- Botón editar --}}
                        <a href="{{ route('tipos.edit', $tipo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        {{-- Botón eliminar --}}
                        <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que deseas eliminar este tipo de préstamo?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection