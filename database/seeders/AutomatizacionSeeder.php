<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AutomatizacionPruebas;


class AutomatizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AutomatizacionPruebas::factory()->count(30)->create();
    }
}
