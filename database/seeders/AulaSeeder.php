<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectores = ["edificio nuevo", "bloque antiguo", "laboratorios"];
        for ($i = 0; $i < 10; $i++) {
            DB::table('aulas')->insert([
                'num_aula' => rand(1, 500),
                'capacidad' => rand(200, 400),
                'sector' => $sectores[rand(0, 2)],
            ]);
        }
    }
}
