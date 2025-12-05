<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestamo extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional, Laravel lo infiere del plural del modelo)
    protected $table = 'tipos_prestamos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}