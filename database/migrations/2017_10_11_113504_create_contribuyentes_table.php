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
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('dui');
            $table->string('nit');
            $table->date('nacimiento');
            $table->mediumText('direccion');
            $table->string('telefono');
            $table->string('sexo');
            $table->integer('estado')->default(1);
            $table->string('motivo')->nullable();
            $table->date('fechabaja')->nullable();
            $table->integer('insolvente')->default(1);
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
