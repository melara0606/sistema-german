<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDuiToConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->integer('edad_alcalde');
            $table->string('oficio');
            $table->string('domicilio_alcalde');
            $table->string('dui');
            $table->string('nit');
            $table->string('nit_alcaldia');
            $table->date('inicio_periodo');
            $table->date('fin_periodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->dropColumn('edad_alcalde');
            $table->dropColumn('oficio');
            $table->dropColumn('domicilio_alcalde');
            $table->dropColumn('dui');
            $table->dropColumn('nit');
            $table->dropColumn('nit_alcaldia');
            $table->dropColumn('inicio_periodo');
            $table->dropColumn('fin_periodo');
        });
    }
}
