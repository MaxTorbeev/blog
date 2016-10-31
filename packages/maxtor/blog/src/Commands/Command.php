<?php

namespace MaxTor\Blog\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use MaxTor\Blog\Seeds\DatabaseSeeder;

class BlogCommand extends Command {


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs  blog  migrations, configs, views and assets.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
//        $this->call('mxtcore:install');

        $this->info('Welcome to MaxTor Blog Installations');
//        $this->call('vendor:publish');
        $this->call('migrate:refresh', ['--path'    => 'vendor/maxtor/blog/src/database/migrations']);
        
//        $this->call('db:seed', ['--class'   => 'DatabaseSeeder' ]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}