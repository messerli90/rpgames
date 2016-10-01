<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            ['title' => 'PC'],
            ['title' => 'PlayStation 2'],
            ['title' => 'PlayStation 3'],
            ['title' => 'PlayStation 4'],
            ['title' => 'Xbox'],
            ['title' => 'Xbox 360'],
            ['title' => 'Xbox One'],
            ['title' => 'Nintendo 64'],
            ['title' => 'Nintendo Wii']
        ]);
    }
}
