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
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            // Relación con tu tabla de configuración de tipos de nómina
            $table->foreignId('tipo_nomina_id')->constrained('tipo_nominas');
            
            $table->string('descripcion'); // Ej: "Primera Quincena Enero 2026"
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->date('fecha_pago');
            
            // Estado para controlar si se puede seguir editando o si ya se cerró el pago
            $table->enum('estado', ['Abierta', 'Cerrada', 'Anulada'])->default('Abierta');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominas');
    }
};
