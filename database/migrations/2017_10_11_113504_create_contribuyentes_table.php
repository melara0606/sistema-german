<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribuyentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuyentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('dui');
            $table->string('nit');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('sexo');
            $table->integer('estado');
            $table->string('motivo')->nullable();
            $table->date('fechabaja')->nullable();
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
        Schema::dropIfExists('contribuyentes');
    }
}
