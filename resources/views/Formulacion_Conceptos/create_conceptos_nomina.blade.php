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
                            <!-- Tipos de Nómina -->
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Aplica a los Tipos de Nómina:</label>
                                <select multiple class="form-control mb-1" id="box_nomina" style="height: 150px; overflow-y: scroll;" onclick="showControls('nomina')"></select>
                                <div id="inputs_nomina"></div> <!-- Hidden inputs for submission -->
                                <div id="controls_nomina" class="control-group d-flex justify-content-between mt-1 d-none">
                                    <button type="button" class="btn btn-warning btn-sm text-dark" onclick="openModal('nomina')">
                                        <i class="fas fa-hand-pointer"></i> Selección
                                    </button>
                                    <a href="{{ route('tipo_nominas.create') }}" target="_blank" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-folder-plus"></i> Agregar
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white" onclick="removeFromBox('nomina')">
                                        <i class="fas fa-trash-alt"></i> Borrar
                                    </button>
                                </div>
                            </div>

                            <!-- Frecuencias -->
                            <div class="col-md-3 position-relative">
                                <label class="form-label small fw-bold">Aplica a las Frecuencias:</label>
                                <select multiple class="form-control mb-1" id="box_frecuencias" style="height: 150px; overflow-y: scroll;" onclick="showControls('frecuencias')"></select>
                                <div id="inputs_frecuencias"></div>
                                <div id="controls_frecuencias" class="control-group d-flex justify-content-between mt-1 d-none">
                                    <button type="button" class="btn btn-warning btn-sm text-dark" onclick="openModal('frecuencias')">
                                        <i class="fas fa-hand-pointer"></i> Selección
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm text-white" onclick="showQuickAddFrecuencia()">
                                        <i class="fas fa-folder-plus"></i> Agregar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white" onclick="removeFromBox('frecuencias')">
                                        <i class="fas fa-trash-alt"></i> Borrar
                                    </button>
                                </div>
                                <!-- Quick Add Form for Frecuencias (Legacy Style) -->
                                <div id="quick_add_frecuencias" class="card shadow d-none" 
                                     style="position: absolute; top: 10%; left: 10%; z-index: 1000; width: 280px; background-color: #ececec; border: 1px solid #888; font-family: sans-serif;">
                                    <div class="card-header p-1 ps-2 small fw-bold text-start" style="background-color: #dadada; border-bottom: 1px solid #aaa; color: #333;">
                                        Incluyendo registro
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="mb-2 row g-0 align-items-center">
                                            <label class="col-4 small text-end pe-2 text-dark">Concepto</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm bg-white border-secondary rounded-0" id="qa_concepto_val" readonly style="font-size: 0.85rem;">
                                            </div>
                                        </div>
                                        <div class="mb-3 row g-0 align-items-center">
                                            <label class="col-4 small text-end pe-2 text-dark">Frecuencia</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm border-secondary rounded-0" id="qa_freq_desc" style="font-size: 0.85rem;">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center gap-2 pb-1">
                                            <button type="button" class="btn btn-sm border-secondary px-3" style="background-color: #e1e1e1; color: #000;" onclick="storeQuickFrecuencia()">
                                                <i class="fas fa-thumbs-up text-warning shadow-sm" style="font-size: 0.9rem;"></i> <span class="small fw-bold">Aceptar</span>
                                            </button>
                                            <button type="button" class="btn btn-sm border-secondary px-3" style="background-color: #e1e1e1; color: #000;" onclick="document.getElementById('quick_add_frecuencias').classList.add('d-none')">
                                                <i class="fas fa-times-circle text-danger shadow-sm bg-white rounded-circle p-0" style="font-size: 0.9rem;"></i> <span class="small fw-bold">Cancelar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Situaciones -->
                            <div class="col-md-3 position-relative">
                                <label class="form-label small fw-bold">Aplica a las Situaciones:</label>
                                <select multiple class="form-control mb-1" id="box_situaciones" style="height: 150px; overflow-y: scroll;" onclick="showControls('situaciones')"></select>
                                <div id="inputs_situaciones"></div>
                                <div id="controls_situaciones" class="control-group d-flex justify-content-between mt-1 d-none">
                                    <button type="button" class="btn btn-warning btn-sm text-dark" onclick="openModal('situaciones')">
                                        <i class="fas fa-hand-pointer"></i> Selección
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm text-white" onclick="showQuickAddSituacion()">
                                        <i class="fas fa-folder-plus"></i> Agregar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white" onclick="removeFromBox('situaciones')">
                                        <i class="fas fa-trash-alt"></i> Borrar
                                    </button>
                                </div>
                                
                                <!-- Quick Add Situaciones (Legacy Style Popup) -->
                                <div id="quick_add_situaciones" class="card shadow d-none" 
                                     style="position: absolute; top: 10%; left: 10%; z-index: 1000; width: 280px; background-color: #ececec; border: 1px solid #888; font-family: sans-serif;">
                                    <div class="card-header p-1 ps-2 small fw-bold text-start" style="background-color: #dadada; border-bottom: 1px solid #aaa; color: #333;">
                                        Incluyendo registro
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="mb-2 row g-0 align-items-center">
                                            <label class="col-4 small text-end pe-2 text-dark">Concepto</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm bg-white border-secondary rounded-0" id="qa_sit_concepto" readonly style="font-size: 0.85rem;">
                                            </div>
                                        </div>
                                        <div class="mb-3 row g-0 align-items-center">
                                            <label class="col-4 small text-end pe-2 text-dark">Situación</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm border-secondary rounded-0" id="qa_sit_val" style="font-size: 0.85rem;">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center gap-2 pb-1">
                                            <button type="button" class="btn btn-sm border-secondary px-3" style="background-color: #e1e1e1; color: #000;" onclick="storeQuickSituacion()">
                                                <i class="fas fa-thumbs-up text-warning shadow-sm" style="font-size: 0.9rem;"></i> <span class="small fw-bold">Aceptar</span>
                                            </button>
                                            <button type="button" class="btn btn-sm border-secondary px-3" style="background-color: #e1e1e1; color: #000;" onclick="document.getElementById('quick_add_situaciones').classList.add('d-none')">
                                                <i class="fas fa-times-circle text-danger shadow-sm bg-white rounded-circle p-0" style="font-size: 0.9rem;"></i> <span class="small fw-bold">Cancelar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Acumula -->
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Acumula a:</label>
                                <select multiple class="form-control mb-1" id="box_acumulados" style="height: 150px; overflow-y: scroll;" onclick="showControls('acumulados')"></select>
                                <div id="inputs_acumulados"></div>
                                <div id="controls_acumulados" class="control-group d-flex justify-content-between mt-1 d-none">
                                    <button type="button" class="btn btn-warning btn-sm text-dark" onclick="openModal('acumulados')">
                                        <i class="fas fa-hand-pointer"></i> Selección
                                    </button>
                                    <a href="{{ route('tipo_acumulados.create') }}" target="_blank" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-folder-plus"></i> Agregar
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white" onclick="removeFromBox('acumulados')">
                                        <i class="fas fa-trash-alt"></i> Borrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modals for Selections -->
                    <!-- Modal Nomina -->
                    <div class="modal fade" id="modalNomina" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Seleccionar Tipos de Nómina</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0" style="max-height: 400px; overflow-y: auto;">
                                    <div class="list-group list-group-flush">
                                        @foreach($tipos_nomina_list as $tn)
                                            <label class="list-group-item list-group-item-action cursor-pointer d-flex justify-content-between align-items-center">
                                                <span>{{ $tn->nombre }}</span>
                                                <input class="form-check-input chk-modal-nomina d-none" type="checkbox" value="{{ $tn->id }}" data-label="{{ $tn->nombre }}" onchange="toggleSelection(this)">
                                                <i class="fas fa-check text-success d-none check-icon"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateBoxFromModal('nomina')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Frecuencias -->
                    <div class="modal fade" id="modalFrecuencias" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Seleccionar Frecuencias</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0" style="max-height: 400px; overflow-y: auto;">
                                    <div class="list-group list-group-flush">
                                        @foreach($frecuencias_list as $fr)
                                            <label class="list-group-item list-group-item-action cursor-pointer d-flex justify-content-between align-items-center">
                                                <span>{{ $fr->descripcion_frecuencia }}</span>
                                                <input class="form-check-input chk-modal-frecuencias d-none" type="checkbox" value="{{ $fr->id }}" data-label="{{ $fr->descripcion_frecuencia }}" onchange="toggleSelection(this)">
                                                <i class="fas fa-check text-success d-none check-icon"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateBoxFromModal('frecuencias')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Situaciones -->
                    <div class="modal fade" id="modalSituaciones" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Seleccionar Situaciones</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0" style="max-height: 400px; overflow-y: auto;">
                                    <div class="list-group list-group-flush">
                                        @foreach($situaciones_list as $sit)
                                            <label class="list-group-item list-group-item-action cursor-pointer d-flex justify-content-between align-items-center">
                                                <span>{{ $sit }}</span>
                                                <input class="form-check-input chk-modal-situaciones d-none" type="checkbox" value="{{ $sit }}" data-label="{{ $sit }}" onchange="toggleSelection(this)">
                                                <i class="fas fa-check text-success d-none check-icon"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateBoxFromModal('situaciones')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Acumulados -->
                    <div class="modal fade" id="modalAcumulados" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Seleccionar Acumulados</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0" style="max-height: 400px; overflow-y: auto;">
                                    <div class="list-group list-group-flush">
                                        @foreach($acumulados_list as $ac)
                                            <label class="list-group-item list-group-item-action cursor-pointer d-flex justify-content-between align-items-center">
                                                <span>{{ $ac->nombre }}</span>
                                                <input class="form-check-input chk-modal-acumulados d-none" type="checkbox" value="{{ $ac->id }}" data-label="{{ $ac->nombre }}" onchange="toggleSelection(this)">
                                                <i class="fas fa-check text-success d-none check-icon"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateBoxFromModal('acumulados')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function openModal(type) {
                            var myModal = new bootstrap.Modal(document.getElementById('modal' + capitalizeFirstLetter(type)));
                            myModal.show();
                        }

                        function showControls(type) {
                            // Hide all control groups first
                            document.querySelectorAll('.control-group').forEach(function(el) {
                                el.classList.add('d-none');
                            });
                            // Store current type if needed, or just show
                            if(type) {
                                document.getElementById('controls_' + type).classList.remove('d-none');
                            }
                        }

                        function showQuickAddFrecuencia() {
                            const code = document.getElementById('codigo').value;
                            document.getElementById('qa_concepto_val').value = code ? code : '(Sin Código)';
                            document.getElementById('qa_freq_desc').value = '';
                            document.getElementById('quick_add_frecuencias').classList.remove('d-none');
                        }

                        function storeQuickFrecuencia() {
                            const desc = document.getElementById('qa_freq_desc').value;
                            if(!desc) {
                                alert('Por favor ingrese una descripción.');
                                return;
                            }

                            fetch("{{ route('tipo_frecuencia_pagos.store') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({ descripcion_frecuencia: desc })
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('Network response');
                                return response.json();
                            })
                            .then(data => {
                                if(data.id) {
                                    // Add to Box and Hidden Inputs
                                    const box = document.getElementById('box_frecuencias');
                                    const inputsContainer = document.getElementById('inputs_frecuencias');
                                    
                                    // Add Option
                                    let option = document.createElement('option');
                                    option.value = data.id;
                                    option.text = data.descripcion_frecuencia;
                                    option.selected = true; // Auto-select/focus?
                                    box.add(option);

                                    // Add Hidden Input
                                    let input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = 'frecuencias[]';
                                    input.value = data.id;
                                    inputsContainer.appendChild(input);

                                    // Close form
                                    document.getElementById('quick_add_frecuencias').classList.add('d-none');
                                    // alert('Frecuencia creada y agregada.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error al crear la frecuencia.');
                            });
                        }

                        function showQuickAddSituacion() {
                            const code = document.getElementById('codigo').value;
                            document.getElementById('qa_sit_concepto').value = code ? code : '(Sin Código)';
                            document.getElementById('qa_sit_val').value = '';
                            document.getElementById('quick_add_situaciones').classList.remove('d-none');
                        }

                        function storeQuickSituacion() {
                            const val = document.getElementById('qa_sit_val').value;
                            if(!val) {
                                alert('Por favor ingrese una situación.');
                                return;
                            }
                            
                            // Add to Box
                            const box = document.getElementById('box_situaciones');
                            const inputsContainer = document.getElementById('inputs_situaciones');

                            let option = document.createElement('option');
                            option.value = val;
                            option.text = val;
                            option.selected = true;
                            box.add(option);

                            // Add Hidden Input
                            let input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'situaciones[]';
                            input.value = val;
                            inputsContainer.appendChild(input);

                            // Close Popup
                            document.getElementById('quick_add_situaciones').classList.add('d-none');
                        }

                        function updateBoxFromModal(type) {
                            const box = document.getElementById('box_' + type);
                            const inputsContainer = document.getElementById('inputs_' + type);
                            box.innerHTML = '';
                            inputsContainer.innerHTML = '';
                            
                            // Select checkboxes inside the specific modal
                            const modal = document.getElementById('modal' + capitalizeFirstLetter(type));
                            const checkboxes = modal.querySelectorAll('.chk-modal-' + type + ':checked');
                            
                            // Field name based on type
                            let fieldName = '';
                            if(type === 'nomina') fieldName = 'tipos_nomina[]';
                            if(type === 'frecuencias') fieldName = 'frecuencias[]';
                            if(type === 'situaciones') fieldName = 'situaciones[]';
                            if(type === 'acumulados') fieldName = 'acumulados[]';

                            checkboxes.forEach(chk => {
                                // Add to Visual Box
                                let option = document.createElement('option');
                                option.value = chk.value;
                                option.text = chk.getAttribute('data-label');
                                box.add(option);

                                // Add Hidden Input for Form Submission
                                let input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = fieldName;
                                input.value = chk.value;
                                inputsContainer.appendChild(input);
                            });
                        }

                        function toggleSelection(checkbox) {
                            const label = checkbox.closest('label');
                            const icon = label.querySelector('.check-icon');
                            
                            if (checkbox.checked) {
                                label.classList.add('bg-light', 'fw-bold');
                                icon.classList.remove('d-none');
                            } else {
                                label.classList.remove('bg-light', 'fw-bold');
                                icon.classList.add('d-none');
                            }
                        }

                        function removeFromBox(type) {
                            const box = document.getElementById('box_' + type);
                            const inputsContainer = document.getElementById('inputs_' + type);
                            const modal = document.getElementById('modal' + capitalizeFirstLetter(type));
                            const selectedOptions = Array.from(box.selectedOptions);
                            
                            selectedOptions.forEach(option => {
                                // 1. Uncheck in Modal
                                const chk = modal.querySelector(`.chk-modal-${type}[value="${option.value}"]`);
                                if (chk) {
                                    chk.checked = false;
                                    toggleSelection(chk); // Update visual state
                                }

                                // 2. Remove Hidden Input
                                const input = inputsContainer.querySelector(`input[value="${option.value}"]`);
                                if (input) input.remove();
                                
                                // 3. Remove from Box
                                option.remove();
                            });
                        }

                        function capitalizeFirstLetter(string) {
                            return string.charAt(0).toUpperCase() + string.slice(1);
                        }
                    </script>

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
