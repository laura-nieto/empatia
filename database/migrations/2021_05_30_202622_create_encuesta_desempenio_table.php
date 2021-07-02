<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaDesempenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_desempenio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datos_id')->constrained('datos');
            $table->foreignId('pregunta_id')->constrained('desempenio_laboral');
            $table->string('respuesta')->nullable();
            $table->string('tipo');
            $table->string('evaluado');
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
        Schema::dropIfExists('encuesta_desempenio');
    }
}
