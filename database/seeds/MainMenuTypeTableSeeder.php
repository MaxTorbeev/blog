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
                'title'             => 'root',
                'alias'             => 'root',
                'extensions_id'     => 2
            ]
        );

        DB::table('menu')->insert(
            [
                'menu_type_id'      => '1',
                'title'             => 'Панель управления',
                'alias'             => 'dashboard',
                'extensions_id'     => 2
            ]
        );

        DB::table('menu')->insert(
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер расширений',
                'alias'             => 'manage-extensions',
                'extensions_id'     => 1
            ]
        );

        DB::table('menu')->insert(
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер меню',
                'alias'             => 'manage-menus',
                'extensions_id'     => 3
            ]
        );

    }
}
