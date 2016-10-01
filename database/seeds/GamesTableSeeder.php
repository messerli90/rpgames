<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            ["title" => "Half-Life 2"],
            ["title" => "GTA V"],
            ["title" => "CS:GO"],
            ["title" => "Rainbow Six: Siege"],
            ["title" => "Assassins Creed: Syndicate"],
            ["title" => "Far Cry 4"],
            ["title" => "Fallout 4"]
        ]);
    }
}
