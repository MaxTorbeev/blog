<?php

namespace MaxTor\Content\Commands;

use Illuminate\Console\Command;
use MaxTor\MXTCore\Models\Extension;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use MaxTor\Blog\Seeds\DatabaseSeeder;

class ContentCommand extends Command {


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'content:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs content migrations, configs, views and assets.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
//        $this->call('mxtcore:install');

        $this->info('Welcome to MaxTor Blog Installations');

        Extension::updateOrCreate(
            [
                'name'              => 'posts',
                'controller_path'   => 'MaxTor\Blog\Controllers\PostsController',
                'created_user_id'   => '1'
            ]
        ); 
        Extension::updateOrCreate(
            [
                'name'              => 'posts-categories',
                'controller_path'   => 'MaxTor\Blog\Controllers\CategoriesController',
                'created_user_id'   => '1'
            ]
        );
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