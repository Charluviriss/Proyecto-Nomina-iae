<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            
            // Campos de la empresa
            $table->string('codigo'); // Usamos string por si tiene ceros a la izquierda
            $table->string('nro_serial'); // Alfanumérico (letras y números)
            $table->string('nombre');
            
            $table->string('identificador_1'); // Alfanumérico
            $table->string('identificador_2'); // Alfanumérico
            
            $table->text('direccion'); // Text permite más longitud que string
            $table->string('ciudad');
            $table->string('estado_departamento');
            
            // Zona Postal: Mejor string, ya que no harás operaciones matemáticas con ella
            $table->string('zona_postal'); 
            
            // Teléfono: Siempre string para permitir signos como '+' o espacios
            $table->string('telefono');
            
            $table->string('representante');
            $table->string('encargado_rrhh');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
