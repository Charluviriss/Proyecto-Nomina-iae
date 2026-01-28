<?php

use Illuminate\Support\Facades\Route;

//empleados
use App\Http\Controllers\EmpleadoController;

//nominas
use App\Http\Controllers\NominaController;

// Rutas para la empresa
use App\Http\Controllers\EmpresaController;

//Rutas para Tipos
use App\Http\Controllers\TipoNominaController;
use App\Http\Controllers\TipoFrecuenciaPagoController;
use App\Http\Controllers\TipoAcumuladosController;
use App\Http\Controllers\TipoPrestamoController;
use App\Http\Controllers\TipoAumentoController;
use App\Http\Controllers\GuarderiaController;
use App\Http\Controllers\TipoLiquidacionController;
use App\Http\Controllers\TipoAusenciaController;
use App\Http\Controllers\ProfesionesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TabuladorCategoriasController;
use App\Http\Controllers\TipoParentescoController;

use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\DepartamentoController;
//

//formulacion de conceptos
use App\Http\Controllers\GrupoBancoController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\TasaInteresController;
use App\Http\Controllers\BaremoController;
use App\Http\Controllers\TablaAuxiliarController;
use App\Http\Controllers\AdicionalPersonalController;
use App\Http\Controllers\AdicionalConceptoController;
use App\Http\Controllers\ConceptoNominaController;
use App\Http\Controllers\ConstanteFormulaController;
//


use App\Http\Controllers\CalendarioController;

// diseños especiales//
use App\Http\Controllers\DiseñoReporteController;
use App\Http\Controllers\DisenoArchivoTextoController;




Route::get('/', function () {
    return view('layouts.pantalla_principal');
});

//empleados
Route::resource('empleados', EmpleadoController::class);

//rutas para nominas
Route::resource('nominas', NominaController::class);

// Rutas para la empresa
Route::resource('empresas', EmpresaController::class);

//Rutas para Tipos
Route::resource('tipo_nominas', TipoNominaController::class);
Route::resource('tipo_frecuencia_pagos' , TipoFrecuenciaPagoController::class);
Route::resource('tipo_acumulados' , TipoAcumuladosController::class);
Route::resource('tipo_parentesco', TipoParentescoController::class);
Route::resource('tipo_prestamos', TipoPrestamoController::class);
Route::resource('tipo_Aumentos', TipoAumentoController::class);
Route::resource('Guarderias', GuarderiaController::class);
Route::resource('tipo_Liquidacion', TipoLiquidacionController::class);
Route::resource('tipo_ausencias', TipoAusenciaController::class);


//Rutas para Profesiones - Cargos - Categorias
Route::resource('profesiones', ProfesionesController::class)->parameters([
    // Mapea la ruta de 'profesione' a la variable de 'profesion'
    'profesiones' => 'profesion', 
]);
Route::resource('cargos', CargosController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('tabulador_categorias', TabuladorCategoriasController::class);
//

//niveles funcionales//
Route::resource('presupuesto', PresupuestoController::class);
Route::resource('direcciones', DireccionController::class);
Route::resource('departamentos', DepartamentoController::class);

// Usando la ruta 'grupos_bancos' para el recurso RESTful
Route::resource('grupo_bancos', GrupoBancoController::class);


// Usando la ruta 'bancos' para el recurso
Route::resource('bancos', BancoController::class);


// Usando la ruta 'tasas_interes' para el recurso
Route::resource('tasas_interes', TasaInteresController::class);

//rutas para formulacion de conceptos
Route::resource('Formulacion_Conceptos', BaremoController::class);
Route::resource('tablas_auxiliares', TablaAuxiliarController::class);
Route::resource('adicionales_personal', AdicionalPersonalController::class);
Route::resource('adicionales_conceptos', AdicionalConceptoController::class);
Route::resource('conceptos_nomina', ConceptoNominaController::class);
Route::resource('constantes_formulas', ConstanteFormulaController::class);



// Rutas para Calendarios
Route::get('/calendarios', [CalendarioController::class, 'index'])->name('calendarios.index');
Route::get('/calendarios/ver', [CalendarioController::class, 'showCalendar'])->name('calendarios.show');
Route::get('/calendarios/personal', [CalendarioController::class, 'personal'])->name('calendarios.personal');
Route::get('/calendarios/feriados', [CalendarioController::class, 'feriados'])->name('calendarios.feriados');

//  rutas de diseños especiales//
Route::resource('diseños', DiseñoReporteController::class);
Route::resource('diseno', DisenoArchivoTextoController::class);

