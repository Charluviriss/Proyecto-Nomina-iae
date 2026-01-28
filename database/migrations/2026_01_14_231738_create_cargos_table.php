

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50);
            $table->string('descripcion', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}

