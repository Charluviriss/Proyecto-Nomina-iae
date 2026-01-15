@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Grupos de Bancos</h1>
        <a href="{{ route('grupo_bancos.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nuevo Grupo
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
                            <th>Grupo</th>
                            <th>Banco</th>
                            <th>Descripción</th>
                            <th>Sucursal</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->codigo_banco_grupo }}</td>
                                <td>{{ $grupo->codigo_banco_grupo }}</td>
                                <td>{{ $grupo->descripcion }}</td>
                                <td>{{ $grupo->sucursal }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('grupo_bancos.edit', $grupo->id) }}" class="btn btn-warning btn-sm">
                                            Modificar
                                        </a>
                                        <form action="{{ route('grupo_bancos.destroy', $grupo->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar el grupo: {{ $grupo->descripcion }}?')">
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
                        @if($grupos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay Grupos Bancarios registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection