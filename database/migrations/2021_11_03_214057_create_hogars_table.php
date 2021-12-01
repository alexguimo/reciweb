<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHogarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hogars', function (Blueprint $table) {
            $table->bigIncrements('idhogar') ;
            $table->string('id_hogar')->unique();
            $table->float('puntos');
            $table->string('direccion');
            $table->float('puntos_ultimo_reciclado');
            $table->float('peso_ultimo_reciclado');
            $table->float('total_peso_reciclado');
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
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
        Schema::dropIfExists('hogars');
    }
}
