<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResponsableToContratoproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratoproyectos', function (Blueprint $table) {
            $table->string('admin_contrato')->nullable();
            $table->double('monto_garantia')->nullable();
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
            $table->dropColumn('admin_contrato');
            $table->dropColumn('monto_garantia');
        });
    }
}
