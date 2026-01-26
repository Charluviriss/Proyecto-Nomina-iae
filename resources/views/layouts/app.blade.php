<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                {{-- INICIO: MENÚ DE CONFIGURACIÓN (Alineado a la derecha con ms-auto) --}}
                <div class="dropdown "> 
                    
                    {{-- Título principal del Menú: Configuración --}}
                    <button class="btn btn-dark dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Configuración
                    </button>

                    {{-- Botón Empleados (Acceso Directo) --}}
                    <a href="{{ route('empleados.index') }}" class="btn btn-dark btn-lm fw-bold">
                        <i class="fas fa-users"></i> Empleados
                    </a>

                    {{-- Botón Nóminas (Acceso Directo) --}}
                    <a href="{{ route('nominas.index') }}" class="btn btn-dark btn-lm fw-bold">
                        <i class="fas fa-file-invoice-dollar"></i> Nóminas
                    </a>

                    {{-- Contenedor principal del Menú (TODO debe ir aquí dentro) --}}
                    <ul class="dropdown-menu">
                        
                        <li><a class="dropdown-item" href="{{ route('empresas.index') }}"><i class="bi bi-building me-2"></i> Empresa</a></li>
                        
                        
                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 3: NIVELES FUNCIONALES (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuNiveles" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-diagram-3 me-2"></i> Niveles Funcionales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuNiveles">
                                <li><h6 class="dropdown-header">Gestionar Niveles Funcionales</h6></li>
                                <li><a class="dropdown-item" href="{{ route('presupuesto.index') }}">Presupuesto</a></li>
                                <li><a class="dropdown-item" href="{{ route('direcciones.index') }}">Direcciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('departamentos.index') }}">Departamentos</a></li>
                            </ul>
                        </li>

                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 4: TIPOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuTipos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-tags me-2"></i> Tipos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuTipos">
                                <li><h6 class="dropdown-header">Gestionar Tipos</h6></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_nominas.index') }}">Tipo de Nóminas</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_frecuencia_pagos.index') }}">Tipo de Frecuencias de Pago</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_acumulados.index') }}">Tipo de Acumulados</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_ausencias.index') }}">Tipo de Ausencias</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_prestamos.index') }}">Tipo de Prestamos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_Aumentos.index') }}">Tipo de Aumentos</a></li>
                                <li><a class="dropdown-item" href="{{ route('Guarderias.index') }}">Tipo de Guarderias</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_Liquidacion.index') }}">Tipo de Liquidaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('tipo_parentesco.index') }}">Tipo de Parentescos</a>
                                <li><a class="dropdown-item" href="{{ route('tipo_ausencias.index') }}">Tipo de Ausencias</a></li>
                            </ul>
                        </li>
                        
                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>

                        {{-- **OPCIÓN 5: PROFESIONES/CARGOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuProfesiones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-briefcase me-2"></i> Prof. - Cargos - Cat.
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuProfesiones">
                                <li><h6 class="dropdown-header">Profesiones y Cargos</h6></li>
                                <li><a class="dropdown-item" href="{{ route('profesiones.index') }}">Profesiones y Ocupaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('cargos.index') }}">Cargos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tabulador_categorias.index') }}">Tabulador para Categorias</a></li>
                                <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                            </ul>
                        </li>

                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- Opción 6: Calendarios (CON SUBMENÚ) --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuCalendarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="bi bi-calendar3 me-2"></i> Calendarios
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuCalendarios">
                                <li><h6 class="dropdown-header">Gestión de Calendarios</h6></li>
                                <li><a class="dropdown-item" href="{{ route('calendarios.index') }}">Calendario General de la Empresa</a></li>
                                <li><a class="dropdown-item" href="{{ route('calendarios.personal') }}">Calendario por Personal</a></li>
                            </ul>
                        </li>

                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- **OPCIÓN 7: BANCOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuBancos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="bi bi-bank me-2"></i> Bancos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuBancos">
                                <li><h6 class="dropdown-header">Gestión de Grupos Bancarios</h6></li>
                                <li><a class="dropdown-item" href="{{ route('grupo_bancos.index') }}">Grupos Bancos</a></li>
                                <li><a class="dropdown-item" href="{{ route('bancos.index') }}">Bancos</a></li>
                                <li><a class="dropdown-item" href="{{ route('tasas_interes.index') }}">Tasas de Interés</a></li>
                            </ul>
                        </li>

                        {{-- SEPARADOR --}}
                        <li><hr class="dropdown-divider"></li>

                        {{-- **OPCIÓN 8: FORMULACIÓN DE CONCEPTOS (CON SUBMENÚ)** --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuFormulacion" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="bi bi-calculator me-2"></i> Formulación de Conceptos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuFormulacion">
                                <li><h6 class="dropdown-header">Configuración de Conceptos</h6></li>
                                <li><a class="dropdown-item" href="{{ route('Formulacion_Conceptos.index') }}">Baremos (Tablas Escalares)</a></li>
                                <li><a class="dropdown-item" href="{{ route('tablas_auxiliares.index') }}">Tablas Auxiliares para Constantes</a></li>
                                <li><a class="dropdown-item" href="{{ route('adicionales_personal.index') }}">Adicionales Personal (Constantes)</a></li>
                                <li><a class="dropdown-item" href="{{ route('adicionales_conceptos.index') }}">Adicionales Conceptos (Constantes)</a></li>
                                <li><a class="dropdown-item" href="{{ route('conceptos_nomina.index') }}">Conceptos de Nómina de Pago</a></li>
                                <li><a class="dropdown-item" href="{{ route('constantes_formulas.index') }}">Constantes de Formulas</a></li>
                            </ul>
                        </li>


                        
                        

                        {{-- SEPARADOR --}}

                        {{-- Opción 10: Países --}}
                        <li><a class="dropdown-item" href="#"><i class="bi bi-globe-americas me-2"></i> Países</a></li>
                        
                        {{-- Opción 10: Ciudades --}}
                        <li><a class="dropdown-item" href="#"><i class="bi bi-buildings me-2"></i> Ciudades</a></li>
                        
                        {{-- Opción 11: Permisos --}}
                        <li><a class="dropdown-item" href="#"><i class="bi bi-shield-lock me-2"></i> Permisos</a></li>
                        
                        {{-- Opción 12 (Extra): Logs --}}
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-journal-text me-2"></i> Logs del Sistema</a></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}"><i class="bi bi-house-door me-2"></i> Volver al inicio</a></li>

                    </ul>
                </div>
                {{-- FIN: MENÚ DE CONFIGURACIÓN --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    Nómina
                </a>

            </div>
        </nav>

        <main class="py-4">
            @yield('content') 
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!--script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function(element){
            element.addEventListener('click', function(e) {
                let el = this.nextElementSibling;
                if (el && el.classList.contains('dropdown-menu')) {
                    e.preventDefault();
                    e.stopPropagation(); 
                    if(el.style.display === 'block'){
                        el.style.display = 'none';
                    } else {
                        el.style.display = 'block';
                    }
                }
            });
        });
    </script-->

    <script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function(element){

            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); 

                let el = this.nextElementSibling; // El submenú que queremos abrir/cerrar

                if (el && el.classList.contains('dropdown-menu')) {

                    // --- 1. PASO DE CIERRE GLOBAL (LA CORRECCIÓN) ---
                    // Cierra TODOS los submenús abiertos que no son el que acabamos de clicar.
                    document.querySelectorAll('.dropdown-menu .dropdown-menu').forEach(function(subEl) {
                        // Cierra solo si no es el elemento 'el' (el que queremos abrir)
                        if (subEl !== el) {
                            subEl.style.display = 'none';
                        }
                    });

                    // --- 2. PASO DE TOGGLE (Abrir/Cerrar el menú clicado) ---
                    // Abre o cierra el submenú actual (el que tiene el display === 'block')
                    if(el.style.display === 'block'){
                        el.style.display = 'none'; // Si está abierto, ciérralo
                    } else {
                        el.style.display = 'block'; // Si está cerrado, ábrelo
                    }
                }
            });
        });
    </script>
</body>
</html>

