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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->datetime('dia_hora');
            $table->tinyInteger('estado'); // identificar si el partido se ha jugado, en curso o finaliado
            $table->unsignedBigInteger('fecha_id');
            $table->string('estadio_codigo');
            $table->foreign('fecha_id')->references('id')->on('fechas');
            $table->foreign('estadio_codigo')->references('codigo')->on('estadios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
};
