<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('dui');
            $table->string('nit');
            $table->string('sexo');
            $table->string('telefono_fijo')->nullable();
            $table->string('celular');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('num_cuenta');
            $table->string('num_contribuyente')->nullable();
            $table->string('num_seguro_social');
            $table->string('num_afp');
            $table->integer('estado')->unsigned()->default(1);
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
        Schema::dropIfExists('empleados');
    }
}
