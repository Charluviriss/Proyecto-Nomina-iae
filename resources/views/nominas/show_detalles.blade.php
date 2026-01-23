@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    {{-- Encabezado del Proceso --}}
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-secondary text-white py-1 d-flex justify-content-between">
            <h6 class="mb-0">Resumen de Nómina #{{ $nomina->id }}</h6>
            <span class="badge bg-light text-dark">{{ $nomina->estado }}</span>
        </div>
        <div class="card-body bg-light p-3">
            <div class="row small">
                <div class="col-md-3"><strong>Descripción:</strong> {{ $nomina->descripcion }}</div>
                <div class="col-md-3"><strong>Tipo:</strong> {{ $nomina->tipoNomina->descripcion_nomina }}</div>
                <div class="col-md-2"><strong>Desde:</strong> {{ date('d/m/Y', strtotime($nomina->fecha_desde)) }}</div>
                <div class="col-md-2"><strong>Hasta:</strong> {{ date('d/m/Y', strtotime($nomina->fecha_hasta)) }}</div>
                <div class="col-md-2 text-end">
                    <a href="{{ route('nominas.index') }}" class="btn btn-xs btn-dark py-0">Volver</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabla de Trabajadores Capturados --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white py-1">
            <h6 class="mb-0">Personal en este Proceso</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 450px; overflow-y: auto;">
                <table class="table table-sm table-hover table-bordered mb-0">
                    <thead class="table-secondary sticky-top">
                        <tr class="small">
                            <th>Cédula</th>
                            <th>Nombres y Apellidos</th>
                            <th class="text-end">Sueldo Maestro</th>
                            <th class="text-end">Asignaciones</th>
                            <th class="text-end">Deducciones</th>
                            <th class="text-end">Neto a Pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nomina->detalles as $det)
                        <tr class="small">
                            <td>{{ number_format($det->empleado->cedula, 0, ',', '.') }}</td>
                            <td>{{ $det->empleado->apellidos }}, {{ $det->empleado->nombres }}</td>
                            <td class="text-end fw-bold">{{ number_format($det->sueldo_base_momento, 2, ',', '.') }}</td>
                            <td class="text-end text-success">0,00</td> {{-- Aquí irán los bonos luego --}}
                            <td class="text-end text-danger">0,00</td>  {{-- Aquí irán los descuentos luego --}}
                            <td class="text-end fw-bold bg-light">
                                {{ number_format($det->monto_neto, 2, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-secondary fw-bold">
                        <tr>
                            <td colspan="2" class="text-end">TOTALES:</td>
                            <td class="text-end">{{ number_format($nomina->detalles->sum('sueldo_base_momento'), 2, ',', '.') }}</td>
                            <td class="text-end">0,00</td>
                            <td class="text-end">0,00</td>
                            <td class="text-end text-primary">{{ number_format($nomina->detalles->sum('monto_neto'), 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection