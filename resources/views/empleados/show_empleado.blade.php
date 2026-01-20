@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    {{-- Alertas de éxito (Para cuando borres o actualices) --}}
    @if(session('success'))
        <div class="alert alert-success py-1 px-3 small">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm" style="background-color: #f0f0f0;">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Datos Básicos del Personal</h6>
            <button class="btn btn-sm btn-light">X</button>
        </div>

        <div class="card-body p-2">
            {{-- Tabs de Situación --}}
            <ul class="nav nav-tabs mb-2" id="situacionTabs" role="tablist">
                @php
                    $estados = ['Activos', 'Nuevos', 'Suspendidos', 'Vacaciones', 'Jubilados', 'Retirados (Inactivos)'];
                    $situacionActual = request('situacion', 'Activo');
                @endphp

                @foreach($estados as $estado)
                    @php 
                        $valorFiltro = str_contains($estado, 'Retirados') ? 'Inactivo' : rtrim($estado, 's');
                        $isActive = ($situacionActual == $valorFiltro);
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ $isActive ? 'active fw-bold' : '' }}" 
                           href="{{ route('empleados.index', ['situacion' => $valorFiltro]) }}">
                            {{ $estado }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Tabla de Empleados --}}
            <div class="table-responsive" style="height: 400px; overflow-y: auto; background-color: white;">
                <table class="table table-bordered table-sm table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 15%;">Cédula</th>
                            <th style="width: 15%;">Ficha</th>
                            <th style="width: 50%;">Apellidos y Nombres</th>
                            <th style="width: 20%;">Situacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empleados as $emp)
                            <tr onclick="seleccionarFila(this, {{ $emp->id }})" style="cursor: pointer;">
                                <td>{{ number_format($emp->cedula, 0, ',', '.') }}</td>
                                <td>{{ $emp->ficha_Empleado }}</td>
                                <td>{{ $emp->apellidos }}, {{ $emp->nombres }}</td>
                                <td class="text-center">{{ $emp->situacion_laboral }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay empleados en esta categoría</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Buscador y Footer --}}
            <div class="mt-3 p-2 border rounded bg-light">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <span class="me-3 small fw-bold">F2 Buscar y ordenar</span>
                            <input type="text" class="form-control form-control-sm w-50" placeholder="Escriba para filtrar...">
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="fw-bold text-primary">Total Personal : </span>
                        <span class="badge bg-info text-dark fs-6">{{ $totalPersonal }}</span>
                    </div>
                </div>

                {{-- BOTONES DE ACCIÓN --}}
                <div class="mt-3 d-flex justify-content-end">
                    <a href="{{ route('empleados.create') }}" class="btn btn-sm btn-outline-primary me-2">
                        Agregar
                    </a>
                    
                    {{-- Botón Modificar: El script le dará la funcionalidad --}}
                    <button id="btnModificar" class="btn btn-sm btn-outline-primary me-2" disabled>
                        Modificar
                    </button>

                    {{-- Formulario oculto para borrar --}}
                    <form id="formBorrar" action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="btnBorrar" class="btn btn-sm btn-outline-dark me-2" disabled 
                                onclick="confirmarBorrado()">
                            Borrar
                        </button>
                    </form>

                    <a href="/" class="btn btn-sm btn-outline-dark">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let empleadoSeleccionado = null;

    function seleccionarFila(fila, id) {
        // Estilo visual
        document.querySelectorAll('tr').forEach(tr => tr.classList.remove('table-primary'));
        fila.classList.add('table-primary');
        
        empleadoSeleccionado = id;

        // Activar botones
        document.getElementById('btnModificar').disabled = false;
        document.getElementById('btnBorrar').disabled = false;

        // Configurar acción de Modificar
        document.getElementById('btnModificar').onclick = function() {
            window.location.href = `/empleados/${id}/edit`;
        };

        // Configurar URL del formulario de Borrar
        document.getElementById('formBorrar').action = `/empleados/${id}`;
    }

    function confirmarBorrado() {
        if (confirm('¿Está seguro de que desea eliminar este registro?')) {
            document.getElementById('formBorrar').submit();
        }
    }
</script>

<style>
    .nav-tabs .nav-link { color: #444; background-color: #e9ecef; margin-right: 2px; border: 1px solid #dee2e6; }
    .nav-tabs .nav-link.active { background-color: #fff; border-bottom-color: transparent; }
    .table-responsive thead th { position: sticky; top: 0; z-index: 1; }
</style>
@endsection