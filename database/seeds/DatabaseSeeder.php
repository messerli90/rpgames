<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        if(getenv('APP_ENV') == 'local')
        {
            $this->call(UsersTableSeeder::class);
            $this->call(ChallengesTableSeeder::class);
        }

        $this->call(DifficultiesTableSeeder::class);
        $this->call(GamesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(PlatformsTableSeeder::class);
    }
}
