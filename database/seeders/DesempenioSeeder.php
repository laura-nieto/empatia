<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesempenioLaboral;

class DesempenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DesempenioLaboral::factory()->count(13)->create();
    }
}
