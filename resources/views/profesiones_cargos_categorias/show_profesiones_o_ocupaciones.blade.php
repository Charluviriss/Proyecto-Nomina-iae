<!-- resources/views/profesiones/show_profesiones_o_ocupaciones.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detalle Profesión u Ocupación</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $profesion->codigo }}</p>
            <p><strong>Descripción:</strong> {{ $profesion->descripcion }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('profesiones_o_ocupaciones.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection