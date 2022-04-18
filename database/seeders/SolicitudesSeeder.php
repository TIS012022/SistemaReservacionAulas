<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitudes')->insert([
            'cantidad' => rand(100,200),
            'motivo' => "Examen 1er Parcial",
            'hora_ini' => "14:15",
            'hora_fin'=> "15:45",
            'periodo' => "Uno",
            'dia' => "2022-04-16",
            'grupo' => rand(1,10),
            'aula' => rand(1,10),
            'materia' => rand(1,10),
            'docente'=> rand(1,2),
        ]);
        
    }
}
