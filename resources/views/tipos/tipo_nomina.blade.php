@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Nuevo tipo de nomina</h1>
    
    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('tipo_nominas.index') }}" class="btn btn-secondary mb-3">
        Ver tipos de nomina
    </a>

    {{-- 
        El action apunta a la ruta empleados.store (POST), que 
        será el método para guardar los datos en la base de datos.
    --}}
    <form action="{{ route('tipo_nominas.store') }}" method="POST">
        @csrf {{-- ¡Directiva de seguridad obligatoria en Laravel! --}}

        {{-- FILA 1: Nombre, Cédula, Sexo --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nomina" class="form-label">Nueva Nomina:</label>
                <input type="text" 
                    class="form-control @error('descripcion_nomina') is-invalid @enderror" 
                    id="nomina" 
                    name="descripcion_nomina" 
                    value="{{ old('descripcion_nomina') }}" 
                    required>

                {{-- Aquí se muestra el mensaje de error de validación --}}
                @error('descripcion_nomina')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Guardar Nomina</button>
    </form>
</div>
@endsection