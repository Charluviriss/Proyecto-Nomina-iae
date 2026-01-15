@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tasas de Interés</h1>
        <a href="{{ route('tasas_interes.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nueva Tasa
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
                            <th>Año</th>
                            <th>Mes</th>
                            <th>Tasa (%)</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasas as $tasa)
                            <tr>
                                <td>{{ $tasa->año }}</td>
                                <td>{{ $tasa->mes }}</td>
                                <td>{{ number_format($tasa->tasa, 2) }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('tasas_interes.edit', $tasa->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('tasas_interes.destroy', $tasa->id) }}" method="POST" onsubmit="return confirm('¿Confirma eliminar la tasa de {{ $tasa->mes }}/{{ $tasa->año }}?')">
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
                        @if($tasas->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay Tasas de Interés registradas.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection