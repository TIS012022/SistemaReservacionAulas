<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index',
            'permission_buscar',


            'role_index',
            'role_create',
            'role_edit',
            'role_destroy',
            'role_buscar',

            'user_index',
            'user_create',
            'user_edit',
            'user_destroy',
            'user_buscar',

            'solicitud_index',
            'solicitud_aceptar',
            'solicitud_rechazar',
            'solicitud_sugerir',
            'solicitud_buscar',

            'aulaR_index',
            'aulaR_destroy',
            'aulaR_buscar',

            'notificacion_index',
            'notificacion_ver',
            'notificacion_buscar',

            'crear_reserva',

            'aula_index',
            'aula_create',
            'aula_edit',
            'aula_destroy',
            'aula_buscar',

            'materia_index',
            'materia_create',
            'materia_edit',
            'materia_estado',
            'materia_buscar',

            'asignar_index',
            'asignar_create',
            'asignar_edit',
            'asignar_destroy',
            'asignar_buscar',
            
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
