<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario',30);
            $table->string('nombre',100);
            $table->date('fecha_acceso');
            $table->string('accion',50);
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
        Schema::dropIfExists('bitacoras');
    }
}
