<!-- resources/views/diseños_especiales/diseño_reporte.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Diseño de Reporte</h2>

        <div class="mb-3">
            <a href="{{ route('diseños.create') }}" class="btn btn-primary">+ Agregar Nuevo Reporte</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Reporte</th>
                    <th>Archivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tamaño</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diseños as $diseño)
                    <tr>
                        <td>{{ $diseño->report }}</td>
                        <td>
                            @if($diseño->file)
                                <a href="{{ asset('storage/' . $diseño->file) }}" class="btn btn-sm btn-outline-info" download>
                                    <i class="bi bi-download"></i> Descargar
                                </a>
                            @else
                                <span class="text-muted">Sin archivo</span>
                            @endif
                        </td>
                        <td>{{ $diseño->date }}</td>
                        <td>{{ $diseño->time }}</td>
                        <td>{{ $diseño->size }}</td>
                        
                        <td>
                            <a href="{{ route('diseños.edit', $diseño->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('diseños.destroy', $diseño->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Borrar este registro?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
@endsection
