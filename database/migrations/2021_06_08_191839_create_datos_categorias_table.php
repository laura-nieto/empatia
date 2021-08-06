<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datos_id')->constrained('datos');
            $table->foreignId('categorias_id')->constrained('categorias')->onDelete('cascade');
            $table->tinyInteger('tiempo');
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
        Schema::dropIfExists('datos_categorias');
    }
}
