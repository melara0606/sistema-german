<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarActividadARequisicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicions', function (Blueprint $table) {
            $table->dropColumn('unidad_admin');
            $table->bigInteger('unidad_id')->unsigned();
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
            $table->string('unidad_admin');
            $table->dropColumn('unidad_id');
        });
    }
}
