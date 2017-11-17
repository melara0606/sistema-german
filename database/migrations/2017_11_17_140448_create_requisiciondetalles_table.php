<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisiciondetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisiciondetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisicion_id');
            $table->string('codigo');
            $table->integer('cantidad');
            $table->string('unidad_medida');
            $table->string('descripcion');
            $table->foreign('requisicion_id')->references('id')->on('requisicions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisiciondetalles');
    }
}
