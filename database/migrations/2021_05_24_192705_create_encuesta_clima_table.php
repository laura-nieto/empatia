<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaClimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_clima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datos_id')->constrained('datos')->onDelete('cascade');
            $table->foreignId('pregunta_id')->constrained('clima_laboral')->onDelete('cascade');
            $table->string('respuesta')->nullable();
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
        Schema::dropIfExists('encuesta_clima');
    }
}
