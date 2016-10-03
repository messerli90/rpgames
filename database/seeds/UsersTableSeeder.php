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
                'name' => 'kniFely',
                'email' => 'knifely@rpgames.dev',
                'password' => bcrypt('password1')
            ],
            [
                'name' => 'YesMan',
                'email' => 'yesman@rpgames.dev',
                'password' => bcrypt('password1')
            ]
        ]);
    }
}
