<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasCompradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salida_comprador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salida_id');
            $table->foreign('salida_id')->references('id')->on('tbl_salida');
            $table->unsignedBigInteger('comprador_id');
            $table->foreign('comprador_id')->references('id')->on('tbl_comprador');
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
        Schema::dropIfExists('tbl_salida_comprador');
    }
}
