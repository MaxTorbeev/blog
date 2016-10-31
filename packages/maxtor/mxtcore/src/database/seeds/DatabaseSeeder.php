<?php

namespace MaxTor\MXTCore\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        print_r('start');
        DB::table('extensions')->insert(
            [
                'name'              => 'mxtcore',
                'namespace'         => 'MaxTor\MXTCore'
            ]
        );
//        $this->call(\MainMenuTypeTableSeeder::class);
//        $this->call(\ExtensionsTableSeeder::class);
    }
}
