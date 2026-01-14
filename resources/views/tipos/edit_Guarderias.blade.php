@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Guardería: {{ $guarderia->nombre }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('Guarderias.update', $guarderia->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="codigo_guarderia" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo_guarderia" name="codigo_guarderia" value="{{ $guarderia->codigo_guarderia }}" required maxlength="50">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $guarderia->nombre }}" required maxlength="255">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="rif" class="form-label">RIF:</label>
                        <input type="text" class="form-control" id="rif" name="rif" value="{{ $guarderia->rif }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $guarderia->direccion }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="telefono_1" class="form-label">Teléfono 1:</label>
                        <input type="text" class="form-control" id="telefono_1" name="telefono_1" value="{{ $guarderia->telefono_1 }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="telefono_2" class="form-label">Teléfono 2:</label>
                        <input type="text" class="form-control" id="telefono_2" name="telefono_2" value="{{ $guarderia->telefono_2 }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="monto_inscripcion_base" class="form-label">Monto Inscripción:</label>
                        <input type="number" step="0.01" class="form-control" id="monto_inscripcion_base" name="monto_inscripcion_base" value="{{ $guarderia->monto_inscripcion_base }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="monto_mensual_base" class="form-label">Monto Mensual:</label>
                        <input type="number" step="0.01" class="form-control" id="monto_mensual_base" name="monto_mensual_base" value="{{ $guarderia->monto_mensual_base }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success px-4">Actualizar Registro</button>
                    <a href="{{ route('Guarderias.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection