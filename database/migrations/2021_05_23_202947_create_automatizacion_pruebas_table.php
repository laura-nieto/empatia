<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomatizacionPruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automatizacion_pruebas', function (Blueprint $table) {
            $table->id();
            $table->text('pregunta');
            $table->text('opciones');
            $table->string('imagen')->nullable();
            //$table->string('position');
            $table->foreignId('category_id')->constrained('categorias');
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
        Schema::dropIfExists('automatizacion_pruebas');
    }
}
