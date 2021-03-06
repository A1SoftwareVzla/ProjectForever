<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dios PronostiKlo',
                'email' => 'dios@pronostiklo.com',
                'password' => bcrypt('fjog1978.'),
                'gender' => 'M',
                'timeZone' => 'GMT',
            ],[
                'name' => 'José Ortega',
                'email' => 'jjjortega@a1software.com.ve',
                'password' => bcrypt('123qwe'),
                'gender' => 'M',
                'timeZone' => 'GMT',
            ],
        ]);
    }
}
