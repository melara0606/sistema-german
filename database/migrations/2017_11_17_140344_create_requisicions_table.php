<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proyecto_id')->unsigned();
            $table->string('unidad_admin');
            $table->string('linea_trabajo')->nullable();
            $table->string('fuente_financiamiento');
            $table->string('justificacion');
            $table->integer('estado')->default(1);
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
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
        Schema::dropIfExists('requisicions');
    }
}
