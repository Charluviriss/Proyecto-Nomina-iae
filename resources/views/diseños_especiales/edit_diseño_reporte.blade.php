<!-- resources/views/diseños_especiales/edit_diseño_reporte.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Editar Diseño de Reporte</h2>
                <hr>

                <form action="{{ route('diseños.update', $diseño->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="report" class="form-label font-weight-bold">Reporte</label>
                        <input type="text" class="form-control" id="report" name="report" value="{{ $diseño->report }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label font-weight-bold">Archivo</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx">
                        <div class="form-text text-info">
                            <i class="bi bi-info-circle"></i>
                            Archivo actual: <strong>{{ basename($diseño->file) }}</strong>.
                            (Dejar vacío para no cambiarlo).
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label font-weight-bold">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $diseño->date }}"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time" class="form-label font-weight-bold">Hora</label>
                            <input type="time" class="form-control" id="time" name="time" value="{{ $diseño->time }}"
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label font-weight-bold">Tamaño</label>
                        <input type="text" class="form-control" id="size" name="size" value="{{ $diseño->size }}" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Actualizar Cambios
                        </button>
                        <a href="{{ route('diseños.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="button" class="btn btn-danger" onclick="window.close()">Cerrar Ventana</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
