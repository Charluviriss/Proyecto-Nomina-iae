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
        Schema::table('concepto_nominas', function (Blueprint $table) {
            $table->json('tipos_nomina')->nullable();
            $table->json('frecuencias')->nullable();
            $table->json('situaciones')->nullable();
            $table->json('acumulados')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('concepto_nominas', function (Blueprint $table) {
            $table->dropColumn(['tipos_nomina', 'frecuencias', 'situaciones', 'acumulados']);
        });
    }
};
