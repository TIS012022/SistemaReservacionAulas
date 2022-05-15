<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Notifications\NotificationSender;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AulaSeeder::class,
            GrupoSeeder::class,
            MateriaSeeder::class,
            UserSeeder::class,
            DocmateriaSeeder::class,
            //SolicitudSeeder::class,
            //NotificacionSeeder::class,
            //ReservaSeeder::class,
        ]);
    }
}
