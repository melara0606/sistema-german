<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrarCodigoDeRequisiciondetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisiciondetalles', function (Blueprint $table) {
            $table->dropColumn('codigo');
          //  $table->dropColumn('descripcion');
          //  $table->integer('catalogo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisiciondetalles', function (Blueprint $table) {
            $table->string('codigo');
          //  $table->string('descripcion');
          //  $table->dropColumn('catalogo_id');
        });
    }
}
