<?php

namespace MaxTor\MXTCore\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MXTCoreCommand extends Command {


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'mxtcore:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs MXTCore  migrations, configs, views and assets.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        $this->info('Welcome to MXTCore Installations');
        $this->call('vendor:publish');
        $this->call('migrate', ['--path' => 'vendor/maxtor/mxtcore/src/database/migrations']);
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