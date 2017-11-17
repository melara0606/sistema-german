<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudcotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudcotizacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formapago_id');
            $table->string('lugar_entrega');
            $table->string('datos_contenido');
            $table->foreign('formapago_id')->references('id')->on('formapagos');
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
        Schema::dropIfExists('solicitudcotizacions');
    }
}
