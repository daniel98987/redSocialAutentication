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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('textoComentario');
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idPublicacion');
            $table->timestamps();
            $table->foreign('idUsuario')
            ->references('id')
            ->on('users');
            $table->foreign('idPublicacion')
            ->references('id')
            ->on('publicaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
