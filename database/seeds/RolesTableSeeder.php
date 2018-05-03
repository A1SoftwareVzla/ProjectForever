<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'slug' => 'administrator',
                'description' => 'Rol con permisos de acceso a todo el sistema',
                'special' => 'all-access',
            ],
            [
                'name' => 'Usuario',
                'slug' => 'user',
                'description' => 'Rol con permisos reducidos al sistema',
                'special' => null,
            ],
        ]);
    }
}
