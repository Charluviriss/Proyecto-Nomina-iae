<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="dropdown">
        {{-- Título principal del Menú: Configuración --}}
        <button class="btn btn-dark dropdown-toggle" type="button" 
                data-bs-toggle="dropdown" aria-expanded="false">
            ⚙️ Configuración
        </button>

        {{-- Contenedor principal del Menú --}}
        <ul class="dropdown-menu">

            {{-- Opción 1: Sin Submenú --}}
            <li><a class="dropdown-item" href="#">Opción 1: Usuarios</a></li>
             
            
            
            {{-- SEPARADOR --}}
            <li><hr class="dropdown-divider"></li>
            
            {{--  Niveles Funcionales (CON SUBMENÚ DESPLEGABLE)--}}
            <li class="nav-item dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="submenuTipos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Niveles Funcionales
                </a>
                {{-- Contenedor del Submenú --}}
                <ul class="dropdown-menu" aria-labelledby="submenuTipos">
                    {{-- Rutas Solicitadas --}}
                    <li><h6 class="dropdown-header"> Gestionar Niveles Funcionales </h6></li>
                    <li><a class="dropdown-item" href="{{ route('presupuesto.index') }}">Presupuesto</a></li>
                    <li><a class="dropdown-item" href="{{ route('direcciones.index') }}">Direcciones</a></li>
                    <li><a class="dropdown-item" href="{{ route('departamentos.index') }}">Departamentos</a></li>
                    
                </ul>
            </li>


            {{-- SEPARADOR --}}
            <li><hr class="dropdown-divider"></li>

            {{-- **OPCIÓN 3: TIPOS (CON SUBMENÚ DESPLEGABLE)** --}}
            <li class="nav-item dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="submenuTipos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ✨ Tipos
                </a>
                {{-- Contenedor del Submenú --}}
                <ul class="dropdown-menu" aria-labelledby="submenuTipos">
                    {{-- Rutas Solicitadas --}}
                    <li><h6 class="dropdown-header">Gestionar Tipos</h6></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_nominas.index') }}">Tipo de Nóminas</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_frecuencia_pagos.index') }}">Tipo de Frecuencias de Pago</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_acumulados.index') }}">Tipo de Acumulados</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_ausencias.index') }}">Tipo de Ausencias</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_prestamos.index') }}">Tipo de Prestamos</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_Aumentos.index') }}">Tipo de Aumentos</a></li>
                    <li><a class="dropdown-item" href="{{ route('Guarderias.index') }}">Tipo de Guarderias</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_Liquidacion.index') }}">Tipo de Liquidaciones</a></li>
                    <li><a class="dropdown-item" href="{{ route('tipo_parentesco.index') }}">Tipo de Parentescos</a></li>
                </ul>
            </li>

            {{-- SEPARADOR --}}
            <li><hr class="dropdown-divider"></li>

            {{-- Opciones Restantes (4 a 10) --}}
            <li><a class="dropdown-item" href="#">Opción 4: Monedas</a></li>

            {{-- SEPARADOR --}}
            <li><hr class="dropdown-divider"></li>
            
            {{-- **MENÚ DESPLEGABLE: GRUPO DE BANCOS (usando la estructura dropend)** --}}
<li class="nav-item dropend">
    <a class="nav-link dropdown-toggle" href="#" id="submenuGrupoBancos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              🏦 Bancos
    </a>
    {{-- Contenedor del Submenú --}}
    <ul class="dropdown-menu" aria-labelledby="submenuGrupoBancos">
        
        <li><h6 class="dropdown-header">Gestión de Grupos Bancarios</h6></li>
        
        {{-- Enlace principal: Gestión de Grupos Bancarios --}}
        
        <li><hr class="dropdown-divider"></li>
        
        {{-- Rutas de ejemplo (todas apuntando al índice principal de Grupos Bancos por falta de rutas específicas) --}}
        <li><a class="dropdown-item" href="{{ route('grupo_bancos.index') }}">Grupos Bancos</a></li>
        <li><a class="dropdown-item" href="{{ route('bancos.index') }}">Bancos</a></li>
        <li><a class="dropdown-item" href="{{ route('tasas_interes.index') }}"> Tasas de Interés</a></li>
        
    </ul>
</li>

            {{-- SEPARADOR --}}
           <li><hr class="dropdown-divider"></li>
            
            {{-- OPCIÓN 6: Profesiones – Cargos - Catgorias (CON SUBMENÚ DESPLEGABLE)** --}}
            <li class="nav-item dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="submenuTipos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Profesiones – Cargos - Catgorias
                </a>
                {{-- Contenedor del Submenú --}}
                <ul class="dropdown-menu" aria-labelledby="submenuTipos">
                    {{-- Rutas Solicitadas --}}
                    <li><h6 class="dropdown-header"> Gestionar profesiones – cargos - catgorias </h6></li>
                    <li><a class="dropdown-item" href="{{ route('profesiones_o_ocupaciones.index') }}"> Profesiones o ocupaciones</a></li>
                    <li><a class="dropdown-item" href="{{ route('cargos.index') }}"> Cargos</a></li>
                    <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Tabulaciones para categorias</a></li>
                    
                </ul>
           </li>

    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/empleados') }}">
                    Proyecto Nómina
                </a>
            </div>
        </nav>

        <main class="py-4">
            {{-- Aquí se inyectará el contenido de tus vistas (create.blade.php o index.blade.php) --}}
            @yield('content') 
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.dropdown-menu a.dropdown-toggle').forEach(function(element){
            element.addEventListener('click', function(e) {
                let el = this.nextElementSibling;
                if (el && el.classList.contains('dropdown-menu')) {
                    e.preventDefault();
                    e.stopPropagation(); // Evitar que el evento cierre el menú principal
                    if(el.style.display === 'block'){
                        el.style.display = 'none';
                    } else {
                        el.style.display = 'block';
                    }
                }
            });
        });
    </script>
</body>
</html>

