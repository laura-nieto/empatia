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
            [
                'nombre'=>'Kenstel',
                'codigo' => 'INPEKE-01'
            ],
            [
                'nombre'=>'Moss',
                'codigo' => 'TEMOAS-03'
            ],
            [
                'nombre'=>'Test Barsit',
                'codigo' => 'TEBAT-01'
            ],
            [
                'nombre'=>'Test Kostick',
                'codigo'=>'TEKOS-02'
            ],
            [
                'nombre'=>'Valanti',
                'codigo' => 'CUVATI-02'
            ],
            
            [
                'nombre'=>'Test Wonderlic',
                'codigo' => 'TEWONHC-03'
            ],
            [
                'nombre'=>'Cuestionario BFQ',
                'codigo'=>'CUBIFI-01'
            ],
            [
                'nombre'=>'Test DISC',
                'codigo'=>'TEDI-02'
            ],
            [
                'nombre'=>'Test Asertividad',
                'codigo' => 'TEASER-03'
            ],
            [
                'nombre'=>'Cuestionario Estilos Liderazgo',
                'codigo' => 'ESLI-02'
            ],

            [
                'nombre'=>'Cuestionario Estrés Laboral',
                'codigo'=>'ESLA-01'
            ],
            [
                'nombre'=>'Inventario ICE de Baron',
                'codigo'=>'ICE-01'
            ],

        ]);
    }
}
