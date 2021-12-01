<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones', function (Blueprint $table) {
            $table->bigIncrements('idpeticiones') ;
            $table->integer('cant_bolsas');
            $table->string('peticion');
            $table->string('estado_peticion');
            $table->string('comentarios');
            $table->float('puntospeticiones');
            $table->float('pesopeticiones');
            $table->foreignId('hogar_id')
            ->nullable()
            ->references('idhogar')
            ->on('hogars')
            ->cascadeOnUpdate()
            ->nullOnDelete();
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
        Schema::dropIfExists('peticiones');
    }
}
