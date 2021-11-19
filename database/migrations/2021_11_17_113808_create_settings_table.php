<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('color_header')->nullable();
            $table->string('letras_header')->nullable();
            $table->string('color_menu')->nullable();
            $table->string('letras_menu')->nullable();
            $table->string('color_main')->nullable();
            $table->string('letras_main')->nullable();
            $table->string('color_login')->nullable();
            $table->string('letras_login')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('settings');
    }
}
