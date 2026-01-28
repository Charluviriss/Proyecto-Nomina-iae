@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Tipo de Parentesco</h2>

    <form action="{{ route('tipo_parentesco.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control"
                   placeholder="Ingrese el código" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control"
                   placeholder="Ingrese la descripción del parentesco" required>
        </div>

        <!-- Aquí puedes agregar otros campos si es necesario -->

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo_parentesco.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

