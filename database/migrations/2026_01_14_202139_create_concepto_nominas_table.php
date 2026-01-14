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
        Schema::create('concepto_nominas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('descripcion', 255);
            $table->string('tipo_concepto', 50); // Asignación, Deducción, Patronal
            $table->string('unidad', 50); // Monto, Horas, Porcentaje, Días, Semanas
            $table->decimal('valor_por_defecto', 15, 2)->default(0);
            
            // Opciones (Booleanas)
            $table->boolean('imprime_detalles')->default(false);
            $table->boolean('prorratea')->default(false);
            $table->boolean('fijo')->default(false);
            $table->boolean('usa_descripcion_alternativa')->default(false);
            $table->boolean('modifica_descripcion')->default(false);
            $table->boolean('bonificable')->default(false);
            $table->boolean('hoja_tiempo')->default(false);
            $table->boolean('muestra_valor_referencia')->default(false);
            $table->boolean('muestra_monto_calculo')->default(false);

            $table->text('formula')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepto_nominas');
    }
};
