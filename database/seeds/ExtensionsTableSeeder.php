<?php

use Illuminate\Database\Seeder;

class ExtensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extensions')->insert(
            [
                'name'              => 'mxtcore',
                'namespace'         => 'MaxTor\MXTCore'
            ]
        );
    }
}
