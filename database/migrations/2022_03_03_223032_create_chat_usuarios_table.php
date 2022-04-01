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
        Schema::create('chat_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsuarioUno');
            $table->unsignedBigInteger('idUsuarioDos');
            // $table->unsignedBigInteger('idChat');
            $table->timestamps();
            $table->foreign('idUsuarioUno')
            ->references('id')
            ->on('users');
            $table->foreign('idUsuarioDos')
            ->references('id')
            ->on('users');
            // $table->foreign('idChat')
            // ->references('id')
            // ->on('chats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_usuarios');
    }
};
