<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesempenioLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desempenio_laboral', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->string('opcion_1')->nullable();
            $table->string('opcion_2')->nullable();
            $table->string('opcion_3')->nullable();
            $table->string('opcion_4')->nullable();
            $table->string('opcion_5')->nullable();
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
        Schema::dropIfExists('desempenio_laboral');
    }
}
