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
        Schema::create('reacciones', function (Blueprint $table) {
            $table->id();

            $table->boolean('like')->default(false);
            $table->boolean('dislike')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idPublicacion');
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
        Schema::dropIfExists('reacciones');
    }
};
