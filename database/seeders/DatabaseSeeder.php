<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClimaSeeder::class);
        $this->call(DesempenioSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
