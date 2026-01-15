@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Incluyendo Campo Personal (Adicionales)</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('adicionales_personal.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="nro_constante" class="form-label">Nro. Constante:</label>
                        <input type="text" class="form-control" id="nro_constante" name="nro_constante" maxlength="10" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="255" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="etiqueta" class="form-label">Etiqueta:</label>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta" maxlength="255" required>
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-md-7 mb-3">
                        <label class="form-label d-block">Tipo Dato:</label>
                        <div class="d-flex gap-3 pt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_dato" id="tipo1" value="Alfanumérico" checked>
                                <label class="form-check-label" for="tipo1">Alfanumérico</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_dato" id="tipo2" value="Numérico">
                                <label class="form-check-label" for="tipo2">Numérico</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_dato" id="tipo3" value="Fecha">
                                <label class="form-check-label" for="tipo3">Fecha</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_dato" id="tipo4" value="Tablas">
                                <label class="form-check-label" for="tipo4">Tablas</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" maxlength="255">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Guardar Registro</button>
                    <a href="{{ route('adicionales_personal.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
