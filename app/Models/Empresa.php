<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
use HasFactory;

    /**
     * La tabla asociada al modelo.
     * (Opcional si la tabla se llama 'empresas', pero bueno tenerlo por claridad)
     */
    protected $table = 'empresas';

    /**
     * Los atributos que se pueden asignar de manera masiva.
     * Esto permite que Empresa::create($request->all()) funcione sin errores.
     */
    protected $fillable = [
        'codigo',
        'nro_serial',
        'nombre',
        'identificador_1',
        'identificador_2',
        'direccion',
        'ciudad',
        'estado_departamento',
        'zona_postal',
        'telefono',
        'representante',
        'encargado_rrhh',
    ];

    /**
     * Si quieres que Laravel trate algún campo como un tipo específico 
     * (por ejemplo, si en un futuro decides hacer algo con fechas o booleanos)
     */
    protected $casts = [
        // Aquí podrías poner conversiones si fueran necesarias
    ];
}
