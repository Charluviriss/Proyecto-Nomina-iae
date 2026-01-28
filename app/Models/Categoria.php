<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'campo_grupo',
        'salario',
        'bono_mes',
        'bono_dia',
    ];
}
