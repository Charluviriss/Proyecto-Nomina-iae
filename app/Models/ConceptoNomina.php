<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConceptoNomina extends Model
{
    protected $fillable = [
        'codigo', 
        'descripcion', 
        'tipo_concepto', 
        'unidad', 
        'valor_por_defecto',
        'imprime_detalles',
        'prorratea',
        'fijo',
        'usa_descripcion_alternativa',
        'modifica_descripcion',
        'bonificable',
        'hoja_tiempo',
        'muestra_valor_referencia',
        'muestra_monto_calculo',
        'formula',
        'tipos_nomina',
        'frecuencias',
        'situaciones',
        'acumulados'
    ];

    protected $casts = [
        'tipos_nomina' => 'array',
        'frecuencias' => 'array',
        'situaciones' => 'array',
        'acumulados' => 'array',
    ];
}
