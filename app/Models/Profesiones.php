<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{
    protected $table = 'profesiones';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
    ];

        // Una profesion puede tener muchos empleados
    public function empleados() {
        return $this->hasMany(Empleado::class);
    }
}
