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
        DB::table('roles')->insert([
            'rol' => 'Admin',
            'permiso' => 'Full',
        ]);
        DB::table('roles')->insert([
            'rol' => 'Docente',
            'permiso' => 'User',           
        ]);
        DB::table('roles')->insert([
            'rol' => 'Auxiliar',
            'permiso' => 'User',           
        ]);
    }
}
