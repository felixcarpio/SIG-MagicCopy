<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_producto_pedido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('tbl_producto');
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('tbl_pedido');
            $table->integer('cantidad_ordenada')->nullable(True);
            $table->float('costo_unitario',8,2)->nullable(True);
            $table->date('fecha_recibido')->nullable($value = true);
            $table->integer('existencias')->nullable(True);
            $table->integer('salidas')->default(0);
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
        Schema::dropIfExists('tbl_producto_pedido');
    }
}
