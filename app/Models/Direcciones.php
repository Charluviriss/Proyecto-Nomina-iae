<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'descripcion'];

    // Una direccion puede tener muchos empleados
    public function empleados() {
        return $this->hasMany(Empleado::class);
    }
}
