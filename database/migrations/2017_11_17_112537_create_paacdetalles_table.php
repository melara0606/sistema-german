<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaacdetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paacdetalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('obra');
            $table->bigInteger('paac_id')->unsigned();
            $table->double('enero',8,2);
            $table->double('febrero',8,2);
            $table->double('marzo',8,2);
            $table->double('abril',8,2);
            $table->double('mayo',8,2);
            $table->double('junio',8,2);
            $table->double('julio',8,2);
            $table->double('agosto',8,2);
            $table->double('septiembre',8,2);
            $table->double('octubre',8,2);
            $table->double('noviembre',8,2);
            $table->double('diciembre',8,2);
            $table->double('subtotal',8,2);
            $table->foreign('paac_id')->references('id')->on('paacs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paacdetalles');
    }
}
