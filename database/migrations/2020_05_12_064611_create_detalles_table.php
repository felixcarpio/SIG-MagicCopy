<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('total_detalle',10,2);
            $table->float('total_con_desc',10,2);
            $table->integer('cantidad_vendida');
            $table->integer('existencias');
            $table->string('comentario',50);
            $table->float('costo',10,2);
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('tbl_pedido');
            $table->unsignedBigInteger('salida_id');
            $table->foreign('salida_id')->references('id')->on('tbl_salida');
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
        Schema::dropIfExists('tbl_detalle');
    }
}
