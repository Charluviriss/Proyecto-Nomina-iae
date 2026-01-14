@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tipos de Aumentos</h1>
        <a href="{{ route('tipo_Aumentos.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nuevo Aumento
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
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tiposAumento as $tipo)
                            <tr>
                                <td>{{ $tipo->id }}</td>
                                <td>{{ $tipo->tipo }}</td>
                                <td>{{ $tipo->descripcion }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('tipo_Aumentos.edit', $tipo->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('tipo_Aumentos.destroy', $tipo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este aumento: {{ $tipo->descripcion }}?')">
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
                        @if($tiposAumento->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay tipos de aumento registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection