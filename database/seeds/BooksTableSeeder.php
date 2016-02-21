<?php

use Illuminate\Database\Seeder;

use Illuminate\Config\Repository as Config;
use App\Books;
use App\Authors;
use App\Category;

class BooksTableSeeder extends Seeder
{
    
    public function run()
    {
        // CLEAR TABLE BOOKS
        Books::truncate();

        // SEEDS EXECUTE
        $Authors = Authors::all()->each(function($author) {
            foreach(range(1,10) as $v){
                $category = Category::all(['id'])->random(1);
                $author->books()->save(factory('App\Books')->make(['category_id' => $category->id ]));
            }
        });
    }
}