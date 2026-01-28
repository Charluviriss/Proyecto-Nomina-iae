<!-- resources/views/diseños especiales/create_diseño_archivo_texto.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Agregar Diseño de Archivo de Texto</h2>
            <span class="badge bg-success">Nuevo Registro</span>
        </div>

        <ul class="nav nav-tabs" id="createDisenoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos"
                    type="button" role="tab">Datos Generales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="detalle-tab" data-bs-toggle="tab" data-bs-target="#detalle" type="button"
                    role="tab">Detalle de la Plantilla</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="campos-tab" data-bs-toggle="tab" data-bs-target="#campos" type="button"
                    role="tab">Campos de Archivos Disponibles</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="funciones-tab" data-bs-toggle="tab" data-bs-target="#funciones" type="button"
                    role="tab">Funciones </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="adicionales-tab" data-bs-toggle="tab" data-bs-target="#adicionales"
                    type="button" role="tab">Campos Adicionales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="archivos-tab" data-bs-toggle="tab" data-bs-target="#archivos" type="button"
                    role="tab">Archivos Válidos</button>
            </li>
        </ul>

        <div class="card border-top-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <form action="{{ route('diseno.store') }}" method="POST">
                    @csrf

                    <div class="tab-content" id="createDisenoTabsContent">

                        <div class="tab-pane fade show active" id="datos" role="tabpanel">
                            <div class="row mt-2">
                                <div class="col-md-4 mb-3">
                                    <label for="codigo" class="form-label fw-bold">Código</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" required
                                        maxlength="50" value="{{ old('codigo') }}" placeholder="Ej: SwNomNet">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required
                                        maxlength="255" value="{{ old('descripcion') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="organismo" class="form-label fw-bold">Organismo</label>
                                    <input type="text" class="form-control" id="organismo" name="organismo" required
                                        maxlength="100" value="{{ old('organismo') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="mb-3">
                                <label class="fw-bold">Notas Adicionales (Breves)</label>
                                <input type="text" name="notas" class="form-control" value="{{ old('notas') }}" placeholder="Observaciones breves">
                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="detalle" role="tabpanel">
                            <div class="mt-2">
                                <label for="notas_script" class="form-label fw-bold text-primary">Contenido / Comandos de la
                                    Plantilla</label>
                                <textarea class="form-control font-monospace shadow-sm" id="contenido_script" name="contenido_script"
                                    rows="15" style="background-color: #1e1e1e; color: #d4d4d4; padding: 15px;"
                                    placeholder="ARCHIVO = '...'&#10;ORDEN = '...'&#10;DETALLE(...)">{{ old('notas') }}</textarea>
                                <div class="form-text mt-2">Use esta área para definir la lógica técnica del archivo.</div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="campos" role="tabpanel">
                            <div class="alert alert-info mt-3 text-center">
                                <i class="bi bi-info-circle"></i> Los <strong>Campos Disponibles</strong> se podrán
                                configurar después de guardar el registro inicial.
                            </div>
                        </div>

                        <div class="tab-pane fade" id="funciones" role="tabpanel">
                            <div class="py-5 text-center text-muted italic">Módulo de Funciones disponible tras el guardado.
                            </div>
                        </div>

                        <div class="tab-pane fade" id="adicionales" role="tabpanel">
                            <div class="py-5 text-center text-muted italic">Campos adicionales deshabilitados en modo
                                creación.</div>
                        </div>

                        <div class="tab-pane fade" id="archivos" role="tabpanel">
                            <div class="py-5 text-center text-muted italic">Configure aquí las extensiones permitidas (.txt,
                                .csv).</div>
                        </div>

                    </div>

                    <div class="mt-4 border-top pt-4 d-flex justify-content-end">
                        <a href="{{ route('diseno.index') }}" class="btn btn-outline-secondary px-4 me-2">
                            <i class="bi bi-x-lg"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="bi bi-check-lg"></i> <strong>Guardar Registro</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Estilo de integración de pestañas */
        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-bottom-color: #fff;
            color: #0d6efd;
        }

        /* Estilo del editor oscuro */
        #notas_script:focus {
            background-color: #FFFFFF !important;
            outline: none;
            border-color: #0d6efd;
        }
    </style>
@endsection
