@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Tipo de Parentesco</h2>

    <form action="{{ route('tipo_parentesco.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   placeholder="Ingrese el nombre del parentesco" required>
        </div>

        <!-- Aquí puedes agregar otros campos si es necesario -->

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo_parentesco.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection