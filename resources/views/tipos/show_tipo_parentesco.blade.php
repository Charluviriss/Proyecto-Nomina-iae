@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle de Tipo de Parentesco</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $tipo->codigo }}</p>
            <p><strong>Descripción:</strong> {{ $tipo->descripcion }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tipo_parentesco.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection