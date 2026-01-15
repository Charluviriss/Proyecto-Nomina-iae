<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConstanteFormula extends Model
{
    protected $fillable = ['codigo', 'etiqueta', 'tipo_campo', 'valor'];
}
