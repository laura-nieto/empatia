<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categoria::factory()->count(12)->create();
        DB::table('categorias')->insert([
            ['nombre'=>'Kenstel'],
            ['nombre'=>'Moss'],
            ['nombre'=>'Test Barsit'],
            ['nombre'=>'Test Kostick'],
            ['nombre'=>'Valanti'],
            
            ['nombre'=>'Test Wonderlic'],
            ['nombre'=>'Cuestionario BFQ'],
            ['nombre'=>'Test DISC'],
            ['nombre'=>'Test Asertividad'],
            ['nombre'=>'Cuestionario Estilos Liderazgo'],

            ['nombre'=>'Cuestionario Estrés Laboral'],
            ['nombre'=>'Inventario ICE de Baron'],

        ]);
    }
}
