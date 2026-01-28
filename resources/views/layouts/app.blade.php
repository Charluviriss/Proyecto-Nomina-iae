<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <div class="dropdown">
                    {{-- BOTÓN PRINCIPAL CONFIGURACIÓN --}}
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configuración
                    </button>

                    {{-- ACCESOS DIRECTOS --}}
                    <a href="{{ route('empleados.index') }}" class="btn btn-dark fw-bold">
                        <i class="fas fa-users"></i> Empleados
                    </a>

                    <a href="{{ route('nominas.index') }}" class="btn btn-dark fw-bold">
                        <i class="fas fa-file-invoice-dollar"></i> Nóminas
                    </a>

                    {{-- MENÚ DESPLEGABLE --}}
                    <ul class="dropdown-menu shadow">
                        
                        {{-- 1. EMPRESA --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('empresas.index') }}">
                                <i class="bi bi-building me-2"></i> Empresa
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        {{-- 2. NIVELES FUNCIONALES --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuNiveles" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-diagram-3 me-2"></i> Niveles Funcionales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuNiveles">
                                <li><h6 class="dropdown-header">Gestionar Niveles</h6></li>
                                <li><a class="dropdown-item" href="{{ route('presupuesto.index') }}">Presupuesto</a></li>
                                <li><a class="dropdown-item" href="{{ route('direcciones.index') }}">Direcciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('departamentos.index') }}">Departamentos</a></li>
                            </ul>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        {{-- 3. TIPOS --}}
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

                        <li><hr class="dropdown-divider"></li>

                        {{-- 4. PROFESIONES / CARGOS --}}
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

                        <li><hr class="dropdown-divider"></li>

                        {{-- 5. CALENDARIOS --}}
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

                        <li><hr class="dropdown-divider"></li>

                        {{-- 6. BANCOS --}}
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

                        <li><hr class="dropdown-divider"></li>

                        {{-- 7. FORMULACIÓN --}}
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

                        <li><hr class="dropdown-divider"></li>

                        {{-- 8. DISEÑOS ESPECIALES --}}
                        <li class="nav-item dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenuDisenos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-file-earmark-richtext me-2"></i> Diseños Especiales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="submenuDisenos">
                                <li><h6 class="dropdown-header">Gestión de Diseños</h6></li>
                                <li><a class="dropdown-item" href="{{ route('diseños.index') }}"><i class=""></i> Reportes y Formatos</a></li>
                                <li><a class="dropdown-item" href="{{ route('diseno.index') }}"><i class=""></i> Archivos de Texto</a></li>
                            </ul>
                        </li>

                        
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="#"><i class="bi bi-journal-text me-2"></i> Logs del Sistema</a></li>
                        <li><a class="dropdown-item text-primary" href="{{ url('/') }}"><i class="bi bi-house-door me-2"></i> Volver al inicio</a></li>

                    </ul>
                </div>

                <a class="navbar-brand ms-3" href="{{ url('/') }}">
                    Nómina
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                let el = this.nextElementSibling; 

                if (el && el.classList.contains('dropdown-menu')) {
                    // Cierra otros submenús abiertos
                    document.querySelectorAll('.dropdown-menu .dropdown-menu').forEach(function (subEl) {
                        if (subEl !== el) {
                            subEl.style.display = 'none';
                        }
                    });

                    // Toggle del submenú actual
                    el.style.display = el.style.display === 'block' ? 'none' : 'block';
                }
            });
        });

        // Opcional: Cerrar submenús al hacer clic fuera
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown-menu')) {
                document.querySelectorAll('.dropdown-menu .dropdown-menu').forEach(function (subEl) {
                    subEl.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>