@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Incluyendo registro (Nuevo Concepto)</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('conceptos_nomina.store') }}" method="POST">
                @csrf
                
                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs mb-3" id="conceptoTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab" aria-controls="datos" aria-selected="true">Datos Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="formula-tab" data-bs-toggle="tab" data-bs-target="#formula" type="button" role="tab" aria-controls="formula" aria-selected="false">Fórmula</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="conceptoTabContent">
                    <!-- Tab: Datos Generales -->
                    <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="codigo" class="form-label">Concepto:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" required>
                            </div>
                            <div class="col-md-9">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label d-block">Tipo Concepto:</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_concepto" id="tipo1" value="Asignación" checked>
                                        <label class="form-check-label" for="tipo1">Asignación</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_concepto" id="tipo2" value="Deducción">
                                        <label class="form-check-label" for="tipo2">Deducción</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_concepto" id="tipo3" value="Patronal">
                                        <label class="form-check-label" for="tipo3">Patronal</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label d-block">Unidad:</label>
                                <div class="d-flex gap-3 flex-wrap">
                                    @foreach(['Monto', 'Horas', 'Porcentaje', 'Días', 'Semanas'] as $un)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="unidad" id="un_{{ $loop->index }}" value="{{ $un }}" {{ $un == 'Monto' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="un_{{ $loop->index }}">{{ $un }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="valor_por_defecto" class="form-label">Valor por defecto:</label>
                                <input type="number" step="0.01" class="form-control" id="valor_por_defecto" name="valor_por_defecto" value="0.00">
                            </div>
                        </div>

                        <div class="card bg-light p-3 mb-3">
                            <label class="fw-bold mb-2">Opciones:</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="imprime_detalles" id="opt1">
                                        <label class="form-check-label" for="opt1">¿Se imprime en detalles?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="usa_descripcion_alternativa" id="opt2">
                                        <label class="form-check-label" for="opt2">¿Usa descripción alternativa?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="muestra_valor_referencia" id="opt3">
                                        <label class="form-check-label" for="opt3">¿Muestra valor de referencia?</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="prorratea" id="opt4">
                                        <label class="form-check-label" for="opt4">¿Se prorratea?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="modifica_descripcion" id="opt5">
                                        <label class="form-check-label" for="opt5">¿Se modifica la descripción?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="muestra_monto_calculo" id="opt6">
                                        <label class="form-check-label" for="opt6">¿Muestra monto del cálculo?</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="fijo" id="opt7">
                                        <label class="form-check-label" for="opt7">¿Fijo?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="bonificable" id="opt8">
                                        <label class="form-check-label" for="opt8">¿Bonificable?</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="hoja_tiempo" id="opt9">
                                        <label class="form-check-label" for="opt9">¿Hoja de Tiempo?</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Aplica a los Tipos de Nómina:</label>
                                <div class="border rounded bg-white p-2" style="height: 150px; overflow-y: auto;">
                                    @foreach($tipos_nomina_list as $tn)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tipos_nomina[]" value="{{ $tn->id }}" id="tn_{{ $tn->id }}">
                                            <label class="form-check-label small" for="tn_{{ $tn->id }}">{{ $tn->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Aplica a las Frecuencias:</label>
                                <div class="border rounded bg-white p-2" style="height: 150px; overflow-y: auto;">
                                    @foreach($frecuencias_list as $fr)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="frecuencias[]" value="{{ $fr->id }}" id="fr_{{ $fr->id }}">
                                            <label class="form-check-label small" for="fr_{{ $fr->id }}">{{ $fr->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Aplica a las Situaciones:</label>
                                <div class="border rounded bg-white p-2" style="height: 150px; overflow-y: auto;">
                                    @foreach($situaciones_list as $sit)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="situaciones[]" value="{{ $sit }}" id="sit_{{ $loop->index }}">
                                            <label class="form-check-label small" for="sit_{{ $loop->index }}">{{ $sit }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Acumula a:</label>
                                <div class="border rounded bg-white p-2" style="height: 150px; overflow-y: auto;">
                                    @foreach($acumulados_list as $ac)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="acumulados[]" value="{{ $ac->id }}" id="ac_{{ $ac->id }}">
                                            <label class="form-check-label small" for="ac_{{ $ac->id }}">{{ $ac->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Fórmula -->
                    <div class="tab-pane fade" id="formula" role="tabpanel" aria-labelledby="formula-tab">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="formula_text" class="form-label">Editor de Fórmula:</label>
                                <textarea class="form-control" id="formula_text" name="formula" rows="10" placeholder="Escriba la fórmula aquí..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-2 text-center bg-light">
                                    <label class="fw-bold mb-2">Operadores</label>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                                        @foreach(['+', '-', '*', '/', '(', ')', '>', '<', '=', '>=', '<=', 'AND', 'OR'] as $op)
                                            <button type="button" class="btn btn-sm btn-outline-dark" style="width: 45px;" onclick="document.getElementById('formula_text').value += ' {{ $op }} '">{{ $op }}</button>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                                        @for($i=0; $i<=9; $i++)
                                            <button type="button" class="btn btn-sm btn-secondary" style="width: 45px;" onclick="document.getElementById('formula_text').value += '{{ $i }}'">{{ $i }}</button>
                                        @endfor
                                        <button type="button" class="btn btn-sm btn-danger" style="width: 92px;" onclick="document.getElementById('formula_text').value = ''">Limpiar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-5">Aceptar (Guardar)</button>
                    <a href="{{ route('conceptos_nomina.index') }}" class="btn btn-secondary px-5">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
