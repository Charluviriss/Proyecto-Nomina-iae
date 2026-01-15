<!-- resources/views/profesiones/cargos/show_cargos.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalle del Cargo</h2>
    <p><strong>Código:</strong> {{ $cargo->codigo }}</p>
    <p><strong>Descripción:</strong> {{ $cargo->descripcion }}</p>
    <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
