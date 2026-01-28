@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Profesiones u Ocupaciones</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('profesiones_o_ocupaciones.create') }}" class="btn btn-primary">+ Agregar Nueva Profesión u Ocupación</a>
        
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profesiones as $profesion)
            <tr>
                <td>{{ $profesion->codigo }}</td>
                <td>{{ $profesion->descripcion }}</td>
                <td>
                    <a href="{{ route('profesiones_o_ocupaciones.edit', $profesion->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    
                    <form action="{{ route('profesiones_o_ocupaciones.destroy', $profesion->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de confirmación para cerrar -->
<div class="modal fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="closeModalLabel">Confirmación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        ¿Desea cerrar la pestaña actual?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="window.close()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection