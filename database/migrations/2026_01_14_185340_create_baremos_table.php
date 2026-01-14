<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_baremos_table.php
public function up()
{
    Schema::create('baremos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo', 10)->unique();
        $table->string('descripcion', 255);
        $table->enum('tipo_dato', ['Dias', 'Meses', 'Años', 'Otros']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baremos');
    }
};
