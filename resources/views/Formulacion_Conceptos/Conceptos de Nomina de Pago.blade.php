@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Conceptos de Nómina de Pago</h1>
        <a href="{{ route('conceptos_nomina.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Crear Nuevo Concepto
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
                    <thead class="bg-white text-center">
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Unidad</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($conceptos as $concepto)
                            <tr>
                                <td class="text-center font-monospace">{{ $concepto->codigo }}</td>
                                <td>{{ $concepto->descripcion }}</td>
                                <td class="text-center">
                                    @if($concepto->tipo_concepto == 'Asignación')
                                        <span class="badge bg-success">Asignación</span>
                                    @elseif($concepto->tipo_concepto == 'Deducción')
                                        <span class="badge bg-danger">Deducción</span>
                                    @else
                                        <span class="badge bg-primary">Patronal</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $concepto->unidad }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('conceptos_nomina.edit', $concepto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('conceptos_nomina.destroy', $concepto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($conceptos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay conceptos registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
