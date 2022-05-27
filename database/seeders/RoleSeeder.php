<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rols')->insert([
            'rol' => 'Admin',
            'permiso' => 'Full',
        ]);
        DB::table('rols')->insert([
            'rol' => 'Docente',
            'permiso' => 'User',           
        ]);
        DB::table('rols')->insert([
            'rol' => 'Auxiliar',
            'permiso' => 'User',           
        ]);
    }
}
