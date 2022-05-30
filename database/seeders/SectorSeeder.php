<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sectors')->insert([
            'nombre' => 'Edificio nuevo',
            
        ]);
        DB::table('sectors')->insert([
            'nombre' => 'bloque antiguo',
            
        ]);
        DB::table('sectors')->insert([
            'nombre' => 'laboratorios',
            
        ]);
        DB::table('sectors')->insert([
            'nombre' => 'edificio memi',
            
        ]);
    }
}
