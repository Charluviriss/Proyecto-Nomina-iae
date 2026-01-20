<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
use HasFactory;

    // Nombre de la tabla (opcional si es el plural en inglés, pero bueno ponerlo)
    protected $table = 'empleados';

    // Campos que se pueden llenar masivamente
    protected $guarded = [];

    /**
     * RELACIONES (Tablas de Configuración)
     */

    public function Profesiones() {
        return $this->belongsTo(Profesiones::class);
    }

    public function grupoBanco() {
        return $this->belongsTo(GrupoBanco::class, 'grupo_banco_id');
    }

    public function bancoAuxiliar() {
        return $this->belongsTo(GrupoBanco::class, 'banco_auxiliar_id');
    }

    public function tipoNomina() {
        return $this->belongsTo(TipoNomina::class, 'tipo_nomina_id');
    }

    public function cargo() {
        return $this->belongsTo(Cargos::class);
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }

    public function direccion() {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function presupuesto() {
        return $this->belongsTo(Presupuesto::class);
    }
}
