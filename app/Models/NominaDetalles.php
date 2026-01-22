<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NominaDetalles extends Model
{
    protected $fillable = ['nomina_id', 'empleado_id', 'sueldo_base_momento', 'total_asignaciones', 'total_deducciones', 'monto_neto'];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
}
