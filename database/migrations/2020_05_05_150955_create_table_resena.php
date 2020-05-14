<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableResena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resena', function (Blueprint $table) {
            $table->bigIncrements('IdResena');
            $table->string('Descripcion');
            $table->date('Fecha');
            $table->foreignId('IdUsuario')->references('IdUsuario')->on('usuario');
            $table->foreignId('IdServicio')->references('IdServicios')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_resena');
    }
}
