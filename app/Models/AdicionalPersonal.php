<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdicionalPersonal extends Model
{
    protected $fillable = ['nro_constante', 'descripcion', 'etiqueta', 'tipo_dato', 'valor'];
}
