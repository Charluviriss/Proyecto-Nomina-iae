@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Registrar Nueva Tabla Auxiliar</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tablas_auxiliares.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" maxlength="10" value="{{ old('codigo') }}" required>
                        @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" maxlength="255" value="{{ old('descripcion') }}" required>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Guardar Registro</button>
                    <a href="{{ route('tablas_auxiliares.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
