@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Constantes (Campos Adicionales) del Personal</h1>
        <a href="{{ route('adicionales_personal.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nuevo Adicional
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
                            <th>Nro. Constante</th>
                            <th>Descripción</th>
                            <th>Etiqueta</th>
                            <th>Tipo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adicionales as $adicional)
                            <tr>
                                <td>{{ $adicional->nro_constante }}</td>
                                <td>{{ $adicional->descripcion }}</td>
                                <td>{{ $adicional->etiqueta }}</td>
                                <td>{{ $adicional->tipo_dato }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('adicionales_personal.edit', $adicional->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('adicionales_personal.destroy', $adicional->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($adicionales->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay adicionales registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
