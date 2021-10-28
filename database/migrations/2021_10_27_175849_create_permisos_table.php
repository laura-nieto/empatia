<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('admin')->default('0');
            
            //$table->integer('empresa_id')->unsigned();
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->onDelete('cascade');


        });
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->boolean('clima')->default('0');
            $table->boolean('desempenio')->default('0');
            //Automatizacion
            $table->boolean('kenstel')->default('0');
            $table->boolean('moss')->default('0');
            $table->boolean('barsit')->default('0');
            $table->boolean('kostick')->default('0');
            $table->boolean('valanti')->default('0');
            $table->boolean('wonderlick')->default('0');
            $table->boolean('bfq')->default('0');
            $table->boolean('disc')->default('0');
            $table->boolean('asertividad')->default('0');
            $table->boolean('liderazgo')->default('0');
            $table->boolean('estres')->default('0');
            $table->boolean('ice')->default('0');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
