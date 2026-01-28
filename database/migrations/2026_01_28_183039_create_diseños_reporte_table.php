<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseñosReporteTable extends Migration
{
    public function up()
    {
        Schema::create('diseños_reporte', function (Blueprint $table) {
            $table->id();
            $table->string('report');
            $table->string('file');
            $table->date('date');
            $table->time('time');
            $table->string('size');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diseños_reporte');
    }
}