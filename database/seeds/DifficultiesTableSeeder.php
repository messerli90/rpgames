<?php

use Illuminate\Database\Seeder;

class DifficultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulties')->insert([
            ["id" => 1, "title" => "Beginner"],
            ["id" => 2, "title" => "Easy"],
            ["id" => 3, "title" => "Medium"],
            ["id" => 4, "title" => "Hard"],
            ["id" => 5, "title" => "Expert"],
            ["id" => 6, "title" => "Godlike"]
        ]);
    }
}
