<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    /**
     * El nombre de la tabla asociada al modelo.
     * Por defecto Laravel buscaría "cargos", pero es mejor definirlo.
     */
    protected $table = 'cargos';

    /**
     * Los atributos que se pueden asignar de manera masiva.
     * Basado en tus formularios anteriores, usualmente son 'codigo' y 'descripcion'.
     */
    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    /**
     * Si no vas a usar las columnas 'created_at' y 'updated_at', 
     * descomenta la siguiente línea:
     */
    // public $timestamps = false;
}