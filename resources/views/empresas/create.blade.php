@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Configuración de la Empresa</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empresas.store') }}" method="POST">
                @csrf

                {{-- FILA 1: Código y Serial --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Código:</label>
                        <input type="text" name="codigo" class="form-control" required>
                    </div>
                    {{-- Espacio de separación controlado por el offset o margen --}}
                    <div class="col-md-4 ms-md-4"> 
                        <label class="form-label">Nro. Serial:</label>
                        <input type="text" name="nro_serial" class="form-control" required>
                    </div>
                </div>

                {{-- FILA 2: Nombre (Más largo) --}}
                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label">Nombre de la Empresa:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                </div>

                {{-- FILA 3: Identificadores --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Identificador 1:</label>
                        <input type="text" name="identificador_1" class="form-control">
                    </div>
                    <div class="col-md-4 ms-md-4">
                        <label class="form-label">Identificador 2:</label>
                        <input type="text" name="identificador_2" class="form-control">
                    </div>
                </div>

                {{-- FILA 4: Dirección --}}
                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label">Dirección Fiscal:</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>
                </div>

                {{-- FILA 5: Ciudad y Estado --}}
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Ciudad:</label>
                        <input type="text" name="ciudad" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Estado / Departamento:</label>
                        <input type="text" name="estado_departamento" class="form-control">
                    </div>
                </div>

                {{-- FILA 6: Zona Postal y Teléfonos (Alineados con fila 5) --}}
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Zona Postal:</label>
                        <input type="text" name="zona_postal" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                </div>

                {{-- FILA 7: Representante y Encargado --}}
                <div class="row mb-4">
                    <div class="col-md-5">
                        <label class="form-label">Representante Legal:</label>
                        <input type="text" name="representante" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Encargado de RRHH:</label>
                        <input type="text" name="encargado_rrhh" class="form-control">
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Empresa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection