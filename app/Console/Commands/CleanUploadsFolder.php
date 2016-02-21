<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Config;
use Storage;

class CleanUploadsFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Uploads Folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $directory_path = Config::get('clyde.source_path_prefix') . DIRECTORY_SEPARATOR;
        $directory_cache = Config::get('clyde.cache_path_prefix') . DIRECTORY_SEPARATOR;
        Storage::deleteDirectory($directory_path);
        Storage::deleteDirectory($directory_cache);

        $this->info('Folder successfully clean uploads');
    }
}