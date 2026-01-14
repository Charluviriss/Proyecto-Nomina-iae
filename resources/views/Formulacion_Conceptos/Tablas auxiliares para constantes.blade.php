@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tablas Auxiliares para Constantes</h1>
        <a href="{{ route('tablas_auxiliares.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nueva Tabla Auxiliar
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-white">
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tablasAuxiliares as $tabla)
                            <tr>
                                <td>{{ $tabla->id }}</td>
                                <td>{{ $tabla->codigo }}</td>
                                <td>{{ $tabla->descripcion }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('tablas_auxiliares.edit', $tabla->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('tablas_auxiliares.destroy', $tabla->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($tablasAuxiliares->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay tablas auxiliares registradas.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
