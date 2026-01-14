@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Incluyendo registro (Nueva Constante de Fórmula)</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('constantes_formulas.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="etiqueta" class="form-label">Etiqueta:</label>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta" required>
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-md-7 mb-3">
                        <label class="form-label d-block">Tipo Campo:</label>
                        <div class="d-flex gap-3 pt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_campo" id="tipo1" value="Alfanumérico" checked>
                                <label class="form-check-label" for="tipo1">Alfanumérico</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_campo" id="tipo2" value="Numérico">
                                <label class="form-check-label" for="tipo2">Numérico</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_campo" id="tipo3" value="Fecha">
                                <label class="form-check-label" for="tipo3">Fecha</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Guardar Registro</button>
                    <a href="{{ route('constantes_formulas.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
