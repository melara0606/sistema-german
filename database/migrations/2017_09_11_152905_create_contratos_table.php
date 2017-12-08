<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empleado_id');
            $table->bigInteger('tipocontrato_id');
            $table->bigInteger('cargo_id');
            $table->double('salario',8,2);
            $table->string('motivo')->nullable();
            $table->integer('estado')->default(1);
            $table->foreign('tipocontrato_id')->references('id')->on('tipocontratos');
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
        Schema::dropIfExists('contratos');
    }
}
