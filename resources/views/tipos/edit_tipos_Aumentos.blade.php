@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando Tipo de Aumento: {{ $tipoAumento->tipo }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_Aumentos.update', $tipoAumento->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tipo" class="form-label">Tipo (Código):</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $tipoAumento->tipo }}" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $tipoAumento->descripcion }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success px-4">Actualizar Registro</button>
                    <a href="{{ route('tipo_Aumentos.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection