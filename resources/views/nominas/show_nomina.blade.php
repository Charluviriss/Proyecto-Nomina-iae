@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-1">
            <h6 class="mb-0">Historial de Procesos de Nómina</h6>
            <a href="{{ route('nominas.create') }}" class="btn btn-sm btn-success">+ Nueva Nómina</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-bordered mb-0">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Pago</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nominas as $nom)
                        <tr>
                            <td class="fw-bold">{{ $nom->id }}</td>
                            <td>{{ $nom->descripcion }}</td>
                            <td>{{ $nom->tipoNomina->descripcion_nomina }}</td>
                            <td>{{ date('d/m/Y', strtotime($nom->fecha_desde)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($nom->fecha_hasta)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($nom->fecha_pago)) }}</td>
                            <td>
                                <span class="badge {{ $nom->estado == 'Abierta' ? 'bg-info' : 'bg-secondary' }}">
                                    {{ $nom->estado }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{-- Este botón llevaría a ver los empleados de esa nómina --}}
                                <a href="{{ route('nominas.show', $nom->id) }}" class="btn btn-xs btn-outline-primary py-0">
                                    Ver Detalles
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay procesos generados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection