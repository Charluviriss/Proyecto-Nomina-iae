<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;

    // 1. Definir el nombre de la tabla (opcional si tu tabla es 'profesions')
    // Si tu tabla en la DB se llama 'profesiones', debes especificarlo:
    protected $table = 'profesiones';

    // 2. Definir la llave primaria (opcional si es 'id')
    protected $primaryKey = 'id';

    // 3. Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    // 4. Desactivar timestamps si tu tabla no tiene 'created_at' y 'updated_at'
    // public $timestamps = false;
}