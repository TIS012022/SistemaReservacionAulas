<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DocmateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('docmaterias')->insert([
            'inscritos' => '10',
            'gestion' => 'I-2022',
            'estado' => 'Habilitado',
            'grupo' => '1',
            'materia' => '5',
            'docente' => "2"
        ]);
        DB::table('docmaterias')->insert([
            'inscritos' => '20',
            'gestion' => 'I-2022',
            'estado' => 'Habilitado',
            'grupo' => '2',
            'materia' => '1',
            'docente' => "2"
        ]);
        DB::table('docmaterias')->insert([
            'inscritos' => '30',
            'gestion' => 'I-2022',
            'estado' => 'Habilitado',
            'grupo' => '1',
            'materia' => '2',
            'docente' => "2"
        ]);

    }
}
