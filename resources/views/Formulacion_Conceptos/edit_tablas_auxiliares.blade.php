@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Tabla Auxiliar</h1>
    
    <form action="{{ route('tablas_auxiliares.update', $tablaAuxiliar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $tablaAuxiliar->codigo) }}" maxlength="10" required>
                @error('codigo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8 mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion', $tablaAuxiliar->descripcion) }}" maxlength="255" required>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Actualizar Registro</button>
        <a href="{{ route('tablas_auxiliares.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
</div>
@endsection
