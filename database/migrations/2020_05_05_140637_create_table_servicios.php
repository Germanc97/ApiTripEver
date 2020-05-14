<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('IdServicios');
            $table->string('Titulo');
            $table->string('Pais');
            $table->string('Cuidad');
            $table->integer('MaxPersonas');
            $table->string('Descripcion');
            $table->integer('Precio');
            $table->foreignId('IdHost')->references('IdHost')->on('usuarioHost')->onDelete('cascade');
            $table->foreignId('IdTipoServicio')->references('IdTipoServicio')->on('tipoServicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_servicios');
    }
}
