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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('ficha_Empleado', 50)->unique();
            $table->enum('Nacionalidad', ['Venezolano', 'Extranjero'])->nullable();
            $table->string('cedula', 20)->unique()->nullable();
            $table->string('apellidos', 100)->nullable();
            $table->string('nombres', 100)->nullable();
            $table->enum('sexo', ['Masculino', 'Femenino', 'Otro'])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar', 100)->nullable();
            $table->foreignId('profesion_id')->nullable()
                  ->constrained('profesiones')
                  ->onDelete('cascade');
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->enum('situacion_laboral', ['Nuevo', 'Activo', 'Suspendido', 'Vacaciones', 'Inactivo', 'Jubilado'])->default('Nuevo')->nullable();
            $table->string('foto_empleado', 255)->nullable();//



            
            $table->date('fecha_ingreso')->nullable();
            $table->enum('prestaciones', ['Fideicomiso', 'Fondo', 'Contabilidad'])->nullable();
            $table->enum('tipo_cobro', ['Efectivo', 'Cheque', 'Deposito Ahorro', 'Deposito Cta. Corriente', 'Deposito F.A.L.'])->nullable();
            $table->foreignId('grupo_banco_id')->nullable()
                  ->constrained('grupos_bancos')
                  ->onDelete('cascade');
            $table->string('numero_cuenta', 30)->nullable();//
            $table->foreignId('grupo_banco_auxiliar_id')->nullable()
                  ->constrained('grupos_bancos')
                  ->onDelete('cascade');
            $table->string('numero_cuenta_auxiliar', 30)->nullable();//
            $table->enum('tipo_contrato', ['Fijo', 'Temporal', 'Contratado', 'Pasante']);
            $table->string('Salario', 30)->nullable();



            $table->foreignId('tipo_nomina_id')->nullable()
                  ->constrained('tipo_nominas')
                  ->onDelete('cascade');
            $table->foreignId('presupuesto_id')->nullable()
                  ->constrained('presupuestos')
                  ->onDelete('cascade');
            $table->foreignId('direccion_id')->nullable()
                  ->constrained('direcciones')
                  ->onDelete('cascade');
            $table->foreignId('departamento_id')->nullable()
                  ->constrained('departamentos')
                  ->onDelete('cascade');
            $table->foreignId('categoria_id')->nullable()
                  ->constrained('categorias')
                  ->onDelete('cascade');
            $table->foreignId('cargo_id')->nullable()
                  ->constrained('cargos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
