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
        DB::table('users')->insert(
            [
                'name' => 'José Ortega',
                'email' => 'jjjortega@a1software.com.ve',
                'password' => bcrypt('123'),
                'gender' => 'M',
                'timeZone' => 'GMT',
            ]);
    }
}
