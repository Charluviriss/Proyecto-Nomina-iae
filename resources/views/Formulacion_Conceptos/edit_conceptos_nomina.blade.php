@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Modificando registro: {{ $concepto->codigo }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('conceptos_nomina.update', $concepto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs mb-3" id="editConceptoTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-datos-tab" data-bs-toggle="tab" data-bs-target="#edit-datos" type="button" role="tab" aria-controls="edit-datos" aria-selected="true">Datos Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="edit-formula-tab" data-bs-toggle="tab" data-bs-target="#edit-formula" type="button" role="tab" aria-controls="edit-formula" aria-selected="false">Fórmula</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="editConceptoTabContent">
                    <!-- Tab: Datos Generales -->
                    <div class="tab-pane fade show active" id="edit-datos" role="tabpanel" aria-labelledby="edit-datos-tab">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="codigo" class="form-label">Concepto:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $concepto->codigo }}" required>
                            </div>
                            <div class="col-md-9">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $concepto->descripcion }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label d-block">Tipo Concepto:</label>
                                <div class="d-flex gap-3">
                                    @foreach(['Asignación', 'Deducción', 'Patronal'] as $tipo)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_concepto" id="edit_tipo_{{ $loop->index }}" value="{{ $tipo }}" {{ $concepto->tipo_concepto == $tipo ? 'checked' : '' }}>
                                            <label class="form-check-label" for="edit_tipo_{{ $loop->index }}">{{ $tipo }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label d-block">Unidad:</label>
                                <div class="d-flex gap-3 flex-wrap">
                                    @foreach(['Monto', 'Horas', 'Porcentaje', 'Días', 'Semanas'] as $un)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="unidad" id="edit_un_{{ $loop->index }}" value="{{ $un }}" {{ $concepto->unidad == $un ? 'checked' : '' }}>
                                            <label class="form-check-label" for="edit_un_{{ $loop->index }}">{{ $un }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="valor_por_defecto" class="form-label">Valor por defecto:</label>
                                <input type="number" step="0.01" class="form-control" id="valor_por_defecto" name="valor_por_defecto" value="{{ $concepto->valor_por_defecto }}">
                            </div>
                        </div>

                        <div class="card bg-light p-3 mb-3">
                            <label class="fw-bold mb-2">Opciones:</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="imprime_detalles" id="edit_opt1" {{ $concepto->imprime_detalles ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt1">¿Se imprime en detalles?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="usa_descripcion_alternativa" id="edit_opt2" {{ $concepto->usa_descripcion_alternativa ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt2">¿Usa descripción alternativa?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="muestra_valor_referencia" id="edit_opt3" {{ $concepto->muestra_valor_referencia ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt3">¿Muestra valor de referencia?</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="prorratea" id="edit_opt4" {{ $concepto->prorratea ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt4">¿Se prorratea?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="modifica_descripcion" id="edit_opt5" {{ $concepto->modifica_descripcion ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt5">¿Se modifica la descripción?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="muestra_monto_calculo" id="edit_opt6" {{ $concepto->muestra_monto_calculo ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt6">¿Muestra monto del cálculo?</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="fijo" id="edit_opt7" {{ $concepto->fijo ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt7">¿Fijo?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="bonificable" id="edit_opt8" {{ $concepto->bonificable ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt8">¿Bonificable?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="hoja_tiempo" id="edit_opt9" {{ $concepto->hoja_tiempo ? 'checked' : '' }}>
                                        <label class="form-check-label" for="edit_opt9">¿Hoja de Tiempo?</label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Listas de Aplicación (Basado en la imagen) -->
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Aplica a los Tipos de Nómina:</label>
                                    <div class="border rounded bg-white p-2" style="height: 200px; overflow-y: auto;">
                                        @foreach($tipos_nomina_list as $tn)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tipos_nomina[]" value="{{ $tn->id }}" id="edit_tn_{{ $tn->id }}" {{ in_array($tn->id, $concepto->tipos_nomina ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label small" for="edit_tn_{{ $tn->id }}">{{ $tn->nombre }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Aplica a las Frecuencias:</label>
                                    <div class="border rounded bg-white p-2" style="height: 200px; overflow-y: auto;">
                                        @foreach($frecuencias_list as $fr)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="frecuencias[]" value="{{ $fr->id }}" id="edit_fr_{{ $fr->id }}" {{ in_array($fr->id, $concepto->frecuencias ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label small" for="edit_fr_{{ $fr->id }}">{{ $fr->nombre }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Aplica a las Situaciones:</label>
                                    <div class="border rounded bg-white p-2" style="height: 200px; overflow-y: auto;">
                                        @foreach($situaciones_list as $sit)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="situaciones[]" value="{{ $sit }}" id="edit_sit_{{ $loop->index }}" {{ in_array($sit, $concepto->situaciones ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label small" for="edit_sit_{{ $loop->index }}">{{ $sit }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Acumula a:</label>
                                    <div class="border rounded bg-white p-2" style="height: 200px; overflow-y: auto;">
                                        @foreach($acumulados_list as $ac)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="acumulados[]" value="{{ $ac->id }}" id="edit_ac_{{ $ac->id }}" {{ in_array($ac->id, $concepto->acumulados ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label small" for="edit_ac_{{ $ac->id }}">{{ $ac->nombre }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Fórmula -->
                    <div class="tab-pane fade" id="edit-formula" role="tabpanel" aria-labelledby="edit-formula-tab">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="edit_formula_text" class="form-label">Editor de Fórmula:</label>
                                <textarea class="form-control" id="edit_formula_text" name="formula" rows="10">{{ $concepto->formula }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-2 text-center bg-light">
                                    <label class="fw-bold mb-2">Operadores</label>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                                        @foreach(['+', '-', '*', '/', '(', ')', '>', '<', '=', '>=', '<=', 'AND', 'OR'] as $op)
                                            <button type="button" class="btn btn-sm btn-outline-dark" style="width: 45px;" onclick="document.getElementById('edit_formula_text').value += ' {{ $op }} '">{{ $op }}</button>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                                        @for($i=0; $i<=9; $i++)
                                            <button type="button" class="btn btn-sm btn-secondary" style="width: 45px;" onclick="document.getElementById('edit_formula_text').value += '{{ $i }}'">{{ $i }}</button>
                                        @endfor
                                        <button type="button" class="btn btn-sm btn-danger" style="width: 92px;" onclick="document.getElementById('edit_formula_text').value = ''">Limpiar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success px-5">Actualizar</button>
                    <a href="{{ route('conceptos_nomina.index') }}" class="btn btn-secondary px-5">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
