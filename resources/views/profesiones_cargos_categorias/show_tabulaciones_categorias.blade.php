{{-- resources/views/show_tabulaciones_categorias.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Listado de Categorías y Tabulaciones</h1>

    @if($categorias->isEmpty())
        <div class="alert alert-info text-center">No hay categorías disponibles.</div>
    @else
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Tabulaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr class="table-info fw-bold">
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion ?? 'N/A' }}</td>
                        <td>
                            @if($categoria->tabulaciones->isEmpty())
                                <em>No hay tabulaciones</em>
                            @else
                                <ul class="mb-0">
                                    @foreach($categoria->tabulaciones as $tabulacion)
                                        <li>{{ $tabulacion->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
