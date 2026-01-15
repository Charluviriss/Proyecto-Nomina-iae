@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Bancos</h1>
        <a href="{{ route('bancos.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nuevo Banco
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
                        @foreach($bancos as $banco)
                            <tr>
                                <td>{{ $banco->grupo }}</td>
                                <td>{{ $banco->codigo_banco }}</td>
                                <td>{{ $banco->nombre }}</td>
                                <td>{{ $banco->sucursal }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('bancos.edit', $banco->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('bancos.destroy', $banco->id) }}" method="POST" onsubmit="return confirm('¿Confirma eliminar el banco: {{ $banco->nombre }}?')">
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
                        @if($bancos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay Bancos registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection