<!-- resources/views/diseños especiales/edit_diseño_archivo_texto.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        {{-- Cabecera --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="mb-0">Editar Diseño de Archivo de Texto</h2>
                <small class="text-muted">Modificando registro: <strong>{{ $diseno->codigo }}</strong></small>
            </div>
            <span class="badge bg-primary">ID: {{ $diseno->id }}</span>
        </div>

        {{-- Navegación --}}
        <ul class="nav nav-tabs" id="disenoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active font-weight-bold" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab">Datos Generales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="detalle-tab" data-bs-toggle="tab" data-bs-target="#detalle" type="button" role="tab">Detalle de la Plantilla</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="campos-tab" data-bs-toggle="tab" data-bs-target="#campos" type="button" role="tab">Campos Disponibles</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="funciones-tab" data-bs-toggle="tab" data-bs-target="#funciones" type="button" role="tab">Funciones</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="adicionales-tab" data-bs-toggle="tab" data-bs-target="#adicionales" type="button" role="tab">Campos Adicionales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="archivos-tab" data-bs-toggle="tab" data-bs-target="#archivos" type="button" role="tab">Archivos Válidos</button>
            </li>
        </ul>

        {{-- Tarjeta Principal --}}
        <div class="card border-top-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <form action="{{ route('diseno.update', $diseno->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="tab-content" id="disenoTabsContent">

                        {{-- Pestaña: Datos Generales --}}
                        <div class="tab-pane fade show active" id="datos" role="tabpanel">
                            <div class="row mt-2">
                                <div class="col-md-3 mb-3">
                                    <label for="codigo" class="form-label fw-bold">Código del Archivo</label>
                                    <input type="text" class="form-control bg-light" id="codigo" name="codigo" required value="{{ old('codigo', $diseno->codigo) }}">
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label for="descripcion" class="form-label fw-bold">Descripción Completa</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{ old('descripcion', $diseno->descripcion) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="organismo" class="form-label fw-bold">Organismo / Institución de Destino</label>
                                    <input type="text" class="form-control" id="organismo" name="organismo" required value="{{ old('organismo', $diseno->organismo) }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="notas" class="form-label fw-bold">Notas Adicionales</label>
                                    <input type="text" class="form-control" id="notas" name="notas" maxlength="255" value="{{ old('notas', $diseno->notas) }}" placeholder="Observaciones breves del diseño">
                                </div>
                            </div>
                        </div>

                        {{-- Pestaña: Detalle de la Plantilla --}}
                        <div class="tab-pane fade" id="detalle" role="tabpanel">
                            <div class="mt-2">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="notas" class="form-label fw-bold text-primary mb-0">Script de Configuración</label>
                                    <span class="badge bg-secondary font-monospace">TXT / SQL Mode</span>
                                </div>
                                <textarea class="form-control font-monospace shadow-sm" id="notas" name="notas" rows="16" style="background-color: #1e1e1e; color: #d4d4d4; border: 1px solid #333; font-size: 13px; line-height: 1.5; padding: 15px;">{{ old('notas', $diseno->notas) }}</textarea>
                                <div class="form-text mt-2">
                                    <i class="bi bi-info-circle"></i> Use mayúsculas para los comandos principales (ARCHIVO, ORDEN, DETALLE).
                                </div>
                            </div>
                        </div>

                        {{-- Otras Pestañas --}}
                        <div class="tab-pane fade" id="campos" role="tabpanel">
                            <div class="alert alert-light border mt-3 text-center py-5">
                                <h5 class="text-muted">Explorador de Campos</h5>
                                <p class="mb-0">Los campos de la base de datos aparecerán aquí para ser arrastrados al editor.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="funciones" role="tabpanel">
                            <div class="py-5 text-center">
                                <p class="text-muted italic">No hay funciones personalizadas asignadas a este diseño.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="adicionales" role="tabpanel">
                            <div class="py-5 text-center">
                                <p class="text-muted italic">Módulo de parámetros adicionales en desarrollo.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="archivos" role="tabpanel">
                            <div class="py-5 text-center">
                                <p class="text-muted italic">Formatos de salida: TXT, CSV, EXCEL.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Pie de Formulario --}}
                    <div class="mt-4 border-top pt-4 d-flex justify-content-end align-items-center">
                        <span class="me-auto text-muted small"><em>Última edición detectada: {{ date('d/m/Y H:i') }}</em></span>
                        <a href="{{ route('diseno.index') }}" class="btn btn-outline-secondary px-4 me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="bi bi-save"></i> <strong>Actualizar Diseño</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-bottom-color: #fff;
            font-weight: bold;
            color: #0d6efd;
        }

        #notas:focus {
            background-color: #FFFFFF !important;
            color: #00ff00 !important;
            outline: none;
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.2);
        }
    </style>
@endsection