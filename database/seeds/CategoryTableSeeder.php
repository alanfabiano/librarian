<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    
    public function run()
    {
        Category::truncate();
        $posts = factory('App\Category', 10)->create();
    }
}
