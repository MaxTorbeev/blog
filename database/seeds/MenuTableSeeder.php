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
        DB::table('menu_types')->insert([
                [
                    'slug' => 'no-type',
                    'title' => 'Без типа меню',
                    'description' => 'Тим меню не выбран'
                ],
                [
                    'slug' => 'dashboard',
                    'title' => 'Меню панели управления',
                    'description' => 'Главное меню в панели управления'
                ]
            ]
        );

        DB::table('menu')->insert([
                [
                    'menu_type_id' => 2,
                    'title' => 'Менеджер меню',
                    'route_name' => 'admin.menu.index',
                    'parent_id' => 0
                ],
                [
                    'menu_type_id' => 2,
                    'title' => 'Менеджер пунктов меню',
                    'route_name' => 'admin.menu.index',
                    'parent_id' => 1
                ],
                [
                    'menu_type_id' => 2,
                    'title' => 'Менеджер типов меню',
                    'route_name' => 'admin.menu.index',
                    'parent_id' => 1
                ],
                [
                    'menu_type_id' => 2,
                    'title' => 'Менеджер контента',
                    'route_name' => 'admin.posts.index',
                    'parent_id' => 0
                ]
            ]
        );
    }
}
