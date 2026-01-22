<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $fillable = ['tipo_nomina_id', 'descripcion', 'fecha_desde', 'fecha_hasta', 'fecha_pago', 'estado'];

    public function tipoNomina()
    {
        // Asegúrate de que el nombre del modelo sea 'TipoNomina' 
        // y que la clave foránea en tu tabla sea 'tipo_nomina_id'
        return $this->belongsTo(TipoNomina::class, 'tipo_nomina_id');
    }

    public function detalles() {
        return $this->hasMany(NominaDetalles::class);
    }
}
