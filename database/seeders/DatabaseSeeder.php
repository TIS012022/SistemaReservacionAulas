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
            SectorSeeder::class,
            AulaSeeder::class,
            GrupoSeeder::class,
            MateriaSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            DocmateriaSeeder::class,

            //SolicitudSeeder::class,
            //NotificacionSeeder::class,
            //ReservaSeeder::class,
        ]);
    }
}
