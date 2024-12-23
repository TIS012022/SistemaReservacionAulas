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
        $sectores = ["1", "2", "3", "4"];
        $letras = ['A','B','C','D','E','F','G', ''];
        $estado = ["Habilitado", "Deshabilitado", "Mantenimiento"];
        for ($i = 0; $i < 10; $i++) {
            DB::table('aulas')->insert([
                'codigo' => rand(1,100)*1000,
                'num_aula' => rand(1, 30)*10 . $letras[rand(0,7)],
                'capacidad' => rand(10, 40)*10,
                'sector' => $sectores[rand(0, 3)],
                'estado' => $estado[rand(0,2)],
            ]);
        }
    }
}
