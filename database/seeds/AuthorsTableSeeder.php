<?php

use Illuminate\Database\Seeder;

use App\Authors;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authors::truncate();
        $posts = factory('App\Authors', 30)->create();
    }
}
