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

        // DELETE IMAGES
        $directory_path = \Config::get('clyde.source_path_prefix') . DIRECTORY_SEPARATOR;
        $directory_cache = \Config::get('clyde.cache_path_prefix') . DIRECTORY_SEPARATOR;
        Storage::deleteDirectory($directory_path);
        Storage::deleteDirectory($directory_cache);
        
        $posts = factory('App\Authors', 30)->create();
    }
}
