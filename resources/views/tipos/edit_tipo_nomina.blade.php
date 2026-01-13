@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Tipo de Nómina</h1>
    
    <a href="{{ route('tipo_nominas.index') }}" class="btn btn-secondary mb-3">
        Volver al listado
    </a>

    <form action="{{ route('tipo_nominas.update', $tipoNomina) }}" method="POST">
        @csrf 
        @method('PUT') {{-- IMPORTANTE: Laravel requiere esto para rutas de actualización --}}

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="descripcion_nomina" class="form-label">Nombre de la Nómina:</label>
                <input type="text" 
                       class="form-control @error('descripcion_nomina') is-invalid @enderror" 
                       id="descripcion_nomina" 
                       name="descripcion_nomina" 
                       value="{{ old('descripcion_nomina', $tipoNomina->descripcion_nomina) }}" 
                       required>
                {{-- Aquí se muestra el mensaje de error de validación --}}
                @error('descripcion_nomina')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar Nómina</button>
    </form>
</div>
@endsection