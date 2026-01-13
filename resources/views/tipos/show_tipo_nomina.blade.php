@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Nominas</h1>

    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('tipo_nominas.create') }}" class="btn btn-success mb-3">
        + Registrar Nueva Nomina
    </a>

    @if($tipoNomina->isEmpty())
        <div class="alert alert-warning">
            Aún no hay nominas registradas.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoNomina as $nomina)
                <tr>
                    <td>{{ $nomina->id }}</td>
                    <td>{{ $nomina->descripcion_nomina }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- BOTÓN DE EDITAR --}}
                        <a href="{{ route('tipo_nominas.edit', $nomina) }}" class="btn btn-sm btn-primary me-2" title="Editar">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- BOTÓN DE ELIMINAR --}}
                        <form action="{{ route('tipo_nominas.destroy', $nomina) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta nómina?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection