<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('IdActividad');
            $table->string('Nombre');
            $table->string('Duracion');
            $table->integer('EdadMinima');
            $table->string('Descripcion');
            $table->integer('Precio');
            $table->foreignId('IdServicio')->references('IdServicios')->on('servicios')->onDelete('cascade');
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
        Schema::dropIfExists('table_actividades');
    }
}
