@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Baremo (Tabla Escalar)</h1>
    
    <form action="{{ route('Formulacion_Conceptos.update', $baremo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $baremo->codigo) }}" maxlength="10" required>
                @error('codigo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8 mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion', $baremo->descripcion) }}" maxlength="255" required>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="tipo_dato" class="form-label">Tipo de Dato:</label>
                <select class="form-select @error('tipo_dato') is-invalid @enderror" id="tipo_dato" name="tipo_dato" required>
                    <option value="Dias" {{ old('tipo_dato', $baremo->tipo_dato) == 'Dias' ? 'selected' : '' }}>Días</option>
                    <option value="Meses" {{ old('tipo_dato', $baremo->tipo_dato) == 'Meses' ? 'selected' : '' }}>Meses</option>
                    <option value="Años" {{ old('tipo_dato', $baremo->tipo_dato) == 'Años' ? 'selected' : '' }}>Años</option>
                    <option value="Otros" {{ old('tipo_dato', $baremo->tipo_dato) == 'Otros' ? 'selected' : '' }}>Otros</option>
                </select>
                @error('tipo_dato')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Actualizar Registro</button>
        <a href="{{ route('Formulacion_Conceptos.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
</div>
@endsection
