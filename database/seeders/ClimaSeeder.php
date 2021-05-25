<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClimaLaboral;

class ClimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClimaLaboral::factory()->count(57)->create();
    }
}
