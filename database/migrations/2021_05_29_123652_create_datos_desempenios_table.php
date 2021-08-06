<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosDesempeniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_desempenio', function (Blueprint $table) {
            $table->id();
            $table->string('evaluador');
            $table->string('mail');
            $table->string('puesto_evaluador');
            $table->string('evaluado');
            $table->string('puesto_evaluado');
            $table->string('jerarquia');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->boolean('respondio')->default('0');
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
        Schema::dropIfExists('datos_desempenio');
    }
}
