@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Constantes de Fórmulas</h1>
        <a href="{{ route('constantes_formulas.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Crear Nuevo Registro
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-white">
                        <tr>
                            <th style="width: 15%">Código</th>
                            <th>Nombre</th>
                            <th style="width: 25%">Valor</th>
                            <th style="width: 15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($constantes as $constante)
                            <tr>
                                <td class="font-monospace text-center">{{ $constante->codigo }}</td>
                                <td>{{ $constante->etiqueta }}</td>
                                <td>{{ $constante->valor }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('constantes_formulas.edit', $constante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('constantes_formulas.destroy', $constante->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($constantes->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay constantes registradas.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
