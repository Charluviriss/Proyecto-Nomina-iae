<!-- resources/views/profesiones/cargos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cargos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('cargos.create') }}" class="btn btn-primary mb-3">Agregar</a>
   

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->codigo }}</td>
                <td>{{ $cargo->descripcion }}</td>
                <td>
                    <a href="{{ route('cargos.edit', $cargo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
