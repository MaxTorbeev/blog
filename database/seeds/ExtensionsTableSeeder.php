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
                'id'                => '1',
                'name'              => 'extensions',
                'controller_path'   => 'MaxTor\MXTCore\Controllers\ExtensionsController'
            ]
        );

        DB::table('extensions')->insert(
            [
                'id'                => '2',
                'name'              => 'dashboard',
                'controller_path'   => 'MaxTor\MXTCore\Controllers\DashboardController'
            ]
        );

        DB::table('extensions')->insert(
            [
                'id'                => '3',
                'name'              => 'menu',
                'controller_path'   => 'MaxTor\MXTCore\Controllers\MenuController'
            ]
        );
    }
}
