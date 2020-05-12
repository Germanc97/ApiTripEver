<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTarjetasRegalo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetasRegalo', function (Blueprint $table) {
            $table->bigIncrements('IdTarjeta');
            $table->integer('Monto');
            $table->foreignId('Comprador')->references('IdUsuario')->on('usuario');
            $table->foreignId('Destinatario')->references('IdUsuario')->on('usuario');
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
        Schema::dropIfExists('table_tarjetas_regalo');
    }
}
