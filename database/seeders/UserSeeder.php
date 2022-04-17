<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'administrador@gmail.com',
            'password' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'docente',
            'email' => 'docente@gmail.com',
            'password' => 'docente',
        ]);
    }
}
