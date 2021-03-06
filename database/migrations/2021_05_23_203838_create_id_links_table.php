<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_links', function (Blueprint $table) {
            $table->id();
            $table->text('preguntar_datos')->nullable();
            $table->string('categorias_automatizacion')->nullable();
            $table->string('nombre_desempeño')->nullable();
            $table->boolean('respondio')->default('0');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('id_links');
    }
}
