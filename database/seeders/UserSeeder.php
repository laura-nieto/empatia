<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('admin'),
        // ]);
        DB::table('users')->insert([
            // [
            //     'name'=>'Javier',
            //     'email'=>'javier.puchuri@empatia.com.pe',
            //     'password' => Hash::make('javier12345')
            // ],
            // [
            //     'name'=>'Williams',
            //     'email'=>'williams.garcia@empatia.com.pe',
            //     'password' => Hash::make('williams12345')
            // ],
            // [
            //     'name'=>'Consultor 1',
            //     'email'=>'consultor01@empatia.com.pe',
            //     'password' => Hash::make('consultor01-12345')
            // ],
            // [
            //     'name'=>'Consultor 2',
            //     'email'=>'consultor02@empatia.com.pe',
            //     'password' => Hash::make('consultor02-12345')
            // ],
            // [
            //     'name'=>'Consultor 3',
            //     'email'=>'consultor03@empatia.com.pe',
            //     'password' => Hash::make('consultor03-12345')
            // ]
            [
                'name' => 'Williams',
                'email' => 'williams.garcia@psicologiayemprendimiento.com',
                'password' => Hash::make('williams67890')
            ]
        ]);
    }
}
