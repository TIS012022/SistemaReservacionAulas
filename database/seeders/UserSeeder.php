<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Pedro Perez',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'ci' => '123456',
            'role' => "1"
        ]);
        DB::table('users')->insert([
            'name' => 'Patricia Rodriguez',
            'email' => 'docente@gmail.com',
            'password' => Hash::make('docente'),
            'ci' => '654321',
            'role' => "2",
            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
        DB::table('users')->insert([
            'name' => 'Pablo Montaño',
            'email' => 'docente2@gmail.com',
            'password' => Hash::make('docente'),
            'ci' => '123458',
            'role' => "2",
            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
        DB::table('users')->insert([
            'name' => 'Pablo Alcozer',
            'email' => 'docente3@gmail.com',
            'password' => Hash::make('docente'),
            'ci' => '222122',
            'role' => "3",
            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
    }
}
