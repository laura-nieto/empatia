<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaAutomatizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_automatizacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datos_id')->constrained('datos')->onDelete('SET NULL');
            $table->foreignId('pregunta_id')->constrained('automatizacion_pruebas')->onDelete('SET NULL');
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
        Schema::dropIfExists('encuesta_automatizacion');
    }
}
