<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_type')->insert(
            [
                'id'                => 1,
                'slug'              => 'dashboard',
                'title'             => 'Меню панели управления',
                'description'       => 'Главное меню в панели управления'
            ],
            [
                'id'                => 2,
                'slug'              => 'main-menu',
                'title'             => 'Главное меню',
                'description'       => 'Главное меню сайта'
            ]
        );

        DB::table('menu')->insert(
            [
                'id'                => 1,
                'menu_type_id'      => 1,
                'title'             => 'Менеджер меню',
                'route_name'        => 'admin.menu.index',
                'parent_id'         => 0
            ],
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер пунктов меню',
                'route_name'        => 'admin.menu.index',
                'parent_id'         => 1
            ],
            [
                'menu_type_id'      => '1',
                'title'             => 'Менеджер типов меню',
                'route_name'        => 'admin.menu.index',
                'parent_id'         => '1'
            ]
        );
    }
}
