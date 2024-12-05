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
            'nombre' => 'A sub 15',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'B sub 17',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'A sub 17',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'B sub 13',

        ]);
    }
}
