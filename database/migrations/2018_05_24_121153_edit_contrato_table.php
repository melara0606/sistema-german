<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratoproyectos', function (Blueprint $table) {
            $table->dropForeign('contratoproyectos_cargo_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratoproyectos', function (Blueprint $table) {
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }
}
