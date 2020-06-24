<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_producto',10);
            $table->string('nombre',30);
            $table->string('descripcion_producto',30);
            $table->float('precio_producto',10,2);
            $table->integer('existencia_producto');
            $table->float('precio_con_descuento',10,2);
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('tbl_marca');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('tbl_categoria');
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
        Schema::dropIfExists('tbl_producto');
    }
}
