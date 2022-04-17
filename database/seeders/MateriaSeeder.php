<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreras = ["Sistemas", "Informatica", "Ing Alimentos", "Electromecanica", "Mecanica", "Ing Civil"];
        for ($i = 0; $i < 10; $i++) {
            DB::table('materias')->insert([
                'codigo' => Str::random(3) . rand(100, 500),
                'nombre' => Str::random(10),
                'carrera' => $carreras[rand(0, 5)]
            ]);
        }
    }
}
