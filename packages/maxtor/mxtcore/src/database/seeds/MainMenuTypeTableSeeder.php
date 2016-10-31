<?php

use Illuminate\Database\Seeder;

class MainMenuTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_type')->insert([
            'id'                => 1,
            'menu_type'         => 'dashboard',
            'title'             => 'Dashboard menu',
            'description'       => 'Main menu on dashboard'
        ]);

        DB::table('menu')->insert(
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер расширений',
                'alias'             => 'manage-extensions',
                'extensions_id'     => 0
            ],
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер меню',
                'alias'             => 'manage-menus',
                'extensions_id'     => 0
            ]
        );

    }
}
