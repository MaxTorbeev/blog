<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'access_dashboard',
                'label' => 'Доступ в панель управления',
                'created_by_user_id' => 1
            ],

            // Posts
            [
                'name' => 'show_post',
                'label' => 'Просмотр постов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'create_post',
                'label' => 'Создание постов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'delete_post',
                'label' => 'Удаление постов',
                'created_by_user_id' => 1
            ],

            // Categories
            [
                'name' => 'show_post_category',
                'label' => 'Просмотр категории постов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'create_post_category',
                'label' => 'Создание категории постов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'delete_post_category',
                'label' => 'Удаление категории постов',
                'created_by_user_id' => 1
            ],

            // Tags
            [
                'name' => 'show_tag',
                'label' => 'Просмотр тегов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'create_tag',
                'label' => 'Создание тегов',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'delete_tag',
                'label' => 'Удаление тегов',
                'created_by_user_id' => 1
            ],

            // Menu
            [
                'name' => 'show_menu_item',
                'label' => 'Просмотр пунктов меню',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'create_menu_item',
                'label' => 'Создание пункта меню',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'delete_menu_item',
                'label' => 'Удаление пункта меню',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'show_menu_type',
                'label' => 'Просмотр типов меню',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'create_menu_type',
                'label' => 'Создание типа меню',
                'created_by_user_id' => 1
            ],
            [
                'name' => 'delete_menu_type',
                'label' => 'Удаление типа меню',
                'created_by_user_id' => 1
            ],
        ]);
    }
}
