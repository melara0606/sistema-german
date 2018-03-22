<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatalogoIdToPresupuestodetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestodetalles', function (Blueprint $table) {
            $table->dropColumn('material');
            $table->dropColumn('item');
            $table->dropColumn('categoria');
            $table->dropColumn('unidad');
            $table->bigInteger('catalogo_id');
            $table->foreign('catalogo_id')->references('id')->on('catalogos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuestodetalles', function (Blueprint $table) {
            $table->string('material');
            $table->integer('item');
            $table->string('categoria');
            $table->string('unidad');
            $table->dropForeign('presupuestodetalles_catalogo_id_foreign');
            $table->dropColumn('catalogo_id');
        });
    }
}
