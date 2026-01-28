<!-- resources/views/diseños especiales/diseño_archivo_texto.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Diseño de Archivos de Texto</h2>

        <div class="mb-3">
            <a href="{{ route('diseno.create') }}" class="btn btn-primary">+ Agregar Nuevo Archivo de Texto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Organismo</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disenos as $diseno)
                    <tr>
                        <td>{{ $diseno->codigo }}</td>
                        <td>{{ $diseno->descripcion }}</td>
                        <td>{{ $diseno->organismo }}</td>
                        <td>{{ $diseno->notas }}</td>
                        <td>
                            <a href="{{ route('diseno.edit', $diseno->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('diseno.destroy', $diseno->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que desea borrar?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            
        </div>
    </div>
@endsection
