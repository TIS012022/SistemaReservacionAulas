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
            'estadoCuenta' => 'Habilitado',
            'password' => Hash::make('admin'),
            'ci' => '123456',
            'Departamento' => 'Informatica',
        ]);
        DB::table('users')->insert([
            'name' => 'Patricia Rodriguez',
            'email' => 'docente@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => Hash::make('docente'),
            'ci' => '654321',

            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
        DB::table('users')->insert([
            'name' => 'Pablo Montaño',
            'email' => 'docente2@gmail.com',
            'estadoCuenta' => 'Deshabilitado',
            'password' => Hash::make('docente'), 
            'ci' => '123458',

            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
        DB::table('users')->insert([
            'name' => 'Pablo Alcozer',
            'email' => 'docente3@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => Hash::make('docente'),
            'ci' => '222122',

            'Departamento' => 'Informatica',
            'materias_grupos' => 'lorem ipsum'
        ]);
    }
}
