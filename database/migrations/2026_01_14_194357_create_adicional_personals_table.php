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
        Schema::create('adicional_personals', function (Blueprint $table) {
            $table->id();
            $table->string('nro_constante', 10)->unique();
            $table->string('descripcion', 255);
            $table->string('etiqueta', 255);
            $table->string('tipo_dato', 50); // Alfanumérico, Numérico, Fecha, Tablas
            $table->string('valor', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adicional_personals');
    }
};
