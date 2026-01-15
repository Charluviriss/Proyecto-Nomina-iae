@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Tipo de Parentesco</h2>

    <form action="{{ route('tipo_parentesco.update', $tipo_parentesco->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   value="{{ old('nombre', $tipo_parentesco->nombre) }}" required>
        </div>

        <!-- Aquí puedes agregar otros campos si es necesario -->

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('tipo_parentesco.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection