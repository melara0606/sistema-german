<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrarProyectoIdRequisiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicions', function (Blueprint $table) {
            $table->dropForeign('requisicions_proyecto_id_foreign');
            $table->dropColumn('proyecto_id');
            $table->string('actividad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisicions', function (Blueprint $table) {
            $table->bigInteger('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->dropColumn('actividad');
        });
    }
}
