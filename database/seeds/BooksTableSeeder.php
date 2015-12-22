<?php

use Illuminate\Database\Seeder;

use App\Books;
use App\Authors;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Books::truncate();

        $Authors = Authors::all()->each(function($author) {
            foreach(range(1,10) as $v){
                $author->books()->save(factory('App\Books')->make());
            }
        });
    }
}