<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratoproyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empleado_id');
            $table->bigInteger('proyecto_id');
            $table->bigInteger('cargo_id');
            $table->double('salario',8,2);
            $table->text('funciones');
            $table->string('motivo_contratacion')->nullable();
            $table->string('motivo_baja')->nullable();
            $table->integer('estado')->default(1);
            $table->date('inicio_contrato');
            $table->date('fin_contrato');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratoproyectos');
    }
}
