@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Guarderías</h1>
        <a href="{{ route('Guarderias.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nueva Guardería
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                            <th>Descripción (Nombre)</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guarderias as $guarderia)
                            <tr>
                                <td>{{ $guarderia->id }}</td>
                                <td>{{ $guarderia->codigo_guarderia }}</td>
                                <td>{{ $guarderia->nombre }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('Guarderias.edit', $guarderia->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('Guarderias.destroy', $guarderia->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar la Guardería: {{ $guarderia->nombre }}?')">
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
                        @if($guarderias->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay guarderías registradas.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection