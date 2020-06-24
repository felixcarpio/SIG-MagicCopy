<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salida_entidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salida_id');
            $table->foreign('salida_id')->references('id')->on('tbl_salida');
            $table->unsignedBigInteger('entidad_id');
            $table->foreign('entidad_id')->references('id')->on('tbl_entidad');
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
        Schema::dropIfExists('tbl_salida_entidad');
    }
}
