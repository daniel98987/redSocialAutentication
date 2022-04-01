<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('textoMensaje')->nullable();
            $table->string('linkElemento')->nullable();
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idChat');
            $table->timestamps();
            $table->foreign('idUsuario')
            ->references('id')
            ->on('users');
            $table->foreign('idChat')
            ->references('id')
            ->on('chat_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
};
