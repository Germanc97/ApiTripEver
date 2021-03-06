<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('IdUsuario');
            $table->string('Nombre');
            $table->string('Mail');
            $table->string('Telefono');
            $table->date('FechaNacimiento');
            $table->string('TipoIdentificacion');
            $table->string('NoIdentificacion');
            $table->string('Usuario');
            $table->string('Contrasena');
            $table->boolean('Tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_usuario');
    }
}
