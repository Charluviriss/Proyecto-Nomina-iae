@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Agregar Tipo de Préstamo</h2>

    {{-- Mensajes flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Formulario de creación --}}
    <form action="{{ route('tipos.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" 
                   value="{{ old('codigo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" 
                   value="{{ old('descripcion') }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                ➕ Agregar
            </button>
            <a href="{{ route('tipos.index') }}" class="btn btn-secondary">
                ❌ Cancelar
            </a>
        </div>
    </form>
</div>
@endsection