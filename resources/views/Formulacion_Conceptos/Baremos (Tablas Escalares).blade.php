@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Baremos (Tablas Escalares)</h1>
        <a href="{{ route('Formulacion_Conceptos.create') }}" class="btn btn-success" style="background-color: #198754; color: #fff;">
            Registrar Nuevo Baremo
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
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Tipo de Dato</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($baremos as $baremo)
                            <tr>
                                <td>{{ $baremo->id }}</td>
                                <td>{{ $baremo->codigo }}</td>
                                <td>{{ $baremo->descripcion }}</td>
                                <td>{{ $baremo->tipo_dato }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('Formulacion_Conceptos.edit', $baremo->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('Formulacion_Conceptos.destroy', $baremo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
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
                        @if($baremos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay baremos registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
