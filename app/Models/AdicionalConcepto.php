<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdicionalConcepto extends Model
{
    protected $fillable = ['nro_constante', 'descripcion', 'etiqueta', 'tipo_dato', 'valor'];
}
