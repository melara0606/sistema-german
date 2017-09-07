<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('idproveedores');
            $table->string('nombree');
            $table->string('direccion');
            $table->string('telefonoe');
            $table->string('emaile');
            $table->string('nombrer')->nullable();
            $table->string('telfijor')->nullable();
            $table->char('celr', 9)->nullable();
            $table->string('emailr')->nullable();
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
        Schema::dropIfExists('proveedors');
    }
}
