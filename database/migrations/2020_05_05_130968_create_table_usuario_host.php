<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarioHost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioHost', function (Blueprint $table) {
            $table->bigIncrements('IdHost');
            $table->integer('NoCuenta');
            $table->string('MailHost');
            $table->foreignId('IdUsuario')->references('IdUsuario')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_usuario_host');
    }
}
