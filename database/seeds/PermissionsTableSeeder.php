<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Crear Torneo',
                'slug' => 'tournament.create',
                'description' => 'Crear nuevo torneo',
            ],
            [
                'name' => 'Editar Torneo',
                'slug' => 'tournament.edit',
                'description' => 'Editar nuevo torneo',
            ]
        ]);
    }
}
