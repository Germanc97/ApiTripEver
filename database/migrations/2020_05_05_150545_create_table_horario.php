<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHorario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->bigIncrements('IdHorario');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->string('HoraInicio');
            $table->string('HoraFin');
            $table->foreignId('IdUsuario')->references('IdUsuario')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_horario');
    }
}
