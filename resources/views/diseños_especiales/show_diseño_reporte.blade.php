<!-- resources/views/show_diseño_reporte.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Detalle del Diseño de Reporte</h2>
            <div>
                <a href="{{ route('diseños.index') }}" class="btn btn-secondary">Volver al Listado</a>
                <button class="btn btn-danger" onclick="window.close()">Cerrar Ventana</button>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Resumen General</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong><i class="bi bi-file-earmark-text"></i> Nombre:</strong><br>
                            {{ $diseño->report ?? 'Sin nombre' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong><i class="bi bi-calendar-event"></i> Fecha:</strong><br>
                            {{ $diseño->date ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong><i class="bi bi-clock"></i> Hora:</strong><br>
                            {{ $diseño->time ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Archivo y Especificaciones</h5>
            </div>
            <div class="card-body">
                <p><strong>Tamaño registrado:</strong> {{ $diseño->size ?? 'Desconocido' }}</p>
                <p><strong>Archivo adjunto:</strong></p>
                @if($diseño->file)
                    <div class="alert alert-info d-inline-block">
                        <i class="bi bi-paperclip"></i>
                        <strong>{{ basename($diseño->file) }}</strong>
                        <hr>
                        <a href="{{ asset('storage/' . $diseño->file) }}" class="btn btn-primary btn-sm" download>
                            <i class="bi bi-download"></i> Descargar Documento
                        </a>
                    </div>
                @else
                    <p class="text-muted italic">No hay un archivo físico asociado a este registro.</p>
                @endif
            </div>
        </div>

        <div class="text-center mt-5 py-3 border-top">
            <p class="text-muted small">&copy; {{ date('Y') }} Sistema de Gestión - Todos los derechos reservados.</p>
        </div>
    </div>
@endsection
