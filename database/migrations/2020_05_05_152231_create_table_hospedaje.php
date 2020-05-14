<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHospedaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedaje', function (Blueprint $table) {
            $table->bigIncrements('IdHospedaje');
            $table->integer('PrecioNoche');
            $table->string('TipoAcomodacion');
            $table->string('Direccion');
            $table->string('Barrio');
            $table->string('EspecificacionDomicilio');
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
        Schema::dropIfExists('table_hospedaje');
    }
}
