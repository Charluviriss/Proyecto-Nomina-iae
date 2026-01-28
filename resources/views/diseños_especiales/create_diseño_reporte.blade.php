<!-- resources/views/diseños_especiales/create_diseño_reporte.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Crear Nuevo Diseño de Reporte</h2>
                <hr>

                <form action="{{ route('diseños.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="report" class="form-label font-weight-bold">Reporte</label>
                        <input type="text" class="form-control" id="report" name="report" placeholder="Nombre del reporte"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label font-weight-bold">Archivo</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx" required>
                        <div class="form-text text-muted">Formatos permitidos: PDF, Word (Máx. 5MB).</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label font-weight-bold">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time" class="form-label font-weight-bold">Hora</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label font-weight-bold">Tamaño</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Ej: 2MB" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Reporte
                        </button>
                        <a href="{{ route('diseños.index') }}" class="btn btn-secondary">Cancelar</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
