<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements('IdReserva');
            $table->integer('numPersonas');
            $table->foreignId('IdEstado')->references('IdEstado')->on('estadoReserva');
            $table->foreignId('IdUsuario')->references('IdUsuario')->on('usuario')->delete('cascade');
            $table->foreignId('IdServicio')->references('IdServicios')->on('servicios')->delete('cascade');

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
        Schema::dropIfExists('table_reserva');
    }
}
