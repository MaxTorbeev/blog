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
                    'name' => 'Без типа меню',
                    'description' => 'Тим меню не выбран',
                    'created_user_id' => 1
                ],
                [
                    'slug' => 'dashboard',
                    'name' => 'Меню панели управления',
                    'description' => 'Главное меню в панели управления',
                    'created_user_id' => 1
                ]
            ]
        );

        DB::table('menu')->insert([
                [
                    'menu_type_id' => 2,
                    'name' => 'Менеджер меню',
                    'route_name' => 'admin.menu.index',
                    'parent_id' => null,
                    'created_user_id' => 1
                ],
                [
                    'menu_type_id' => 2,
                    'name' => 'Менеджер пунктов меню',
                    'route_name' => 'admin.menu.index',
                    'parent_id' => 1,
                    'created_user_id' => 1
                ],
                [
                    'menu_type_id' => 2,
                    'name' => 'Менеджер типов меню',
                    'route_name' => 'admin.menu-types.index',
                    'parent_id' => 1,
                    'created_user_id' => 1
                ],
                [
                    'menu_type_id' => 2,
                    'name' => 'Менеджер контента',
                    'route_name' => 'admin.posts.index',
                    'parent_id' => null,
                    'created_user_id' => 1
                ]
            ]
        );
    }
}
