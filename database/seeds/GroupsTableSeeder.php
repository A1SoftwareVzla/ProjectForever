<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name'              => 'PronostiKlo',
                'description'       => 'Grupo Global de PronostiKlo.com, si perteneces a este grupo podrás competir con todos los usuarios de la aplicación que se hayan unido a el.',
                'token_invitation'  => 'MQgKL720eAGBzon6SZvj',
                'administrator_id'  => '1',
            ],
        ]);
    }
}
