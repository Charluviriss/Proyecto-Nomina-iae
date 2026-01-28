<!-- resources/views/diseños especiales/show_diseño_archivo_texto.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Detalle del Diseño de Archivo de Texto</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Código:</strong> {{ $diseno->codigo }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $diseno->descripcion }}</li>
        <li class="list-group-item"><strong>Organismo:</strong> {{ $diseno->organismo }}</li>
        <li class="list-group-item"><strong>Notas:</strong> {{ $diseno->notas }}</li>
    </ul>

    <a href="{{ route('diseno.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
