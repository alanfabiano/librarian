<?php

use Illuminate\Database\Seeder;

use App\Authors;
use App\Books;

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
        Books::truncate();

        //factory('App\Authors', 10)->create();




        $posts = factory('App\Authors', 15)
        ->create();
        // ->each(function($post) {
        //     foreach(range(1,15) as $v){
        //         $post->books()->save(factory('App\Books')->make());
        //     }
        // });












    }
}
