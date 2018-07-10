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
                'label' => 'Доступ в панель управления'
            ],
            [
                'name' => 'show_post',
                'label' => 'Просмотр постов'
            ],
            [
                'name' => 'create_post',
                'label' => 'Создание постов'
            ],
            [
                'name' => 'delete_post',
                'label' => 'Удаление постов'
            ],
            [
                'name' => 'show_post_category',
                'label' => 'Просмотр категории постов'
            ],
            [
                'name' => 'create_post_category',
                'label' => 'Создание категории постов'
            ],
            [
                'name' => 'delete_post_category',
                'label' => 'Удаление категории постов'
            ],
            [
                'name' => 'show_menu_item',
                'label' => 'Просмотр пунктов меню'
            ],
            [
                'name' => 'create_menu_item',
                'label' => 'Создание пункта меню'
            ],
            [
                'name' => 'delete_menu_item',
                'label' => 'Удаление пункта меню'
            ],
            [
                'name' => 'show_menu_type',
                'label' => 'Просмотр типов меню'
            ],
            [
                'name' => 'create_menu_type',
                'label' => 'Создание типа меню'
            ],
            [
                'name' => 'delete_menu_type',
                'label' => 'Удаление типа меню'
            ],
        ]);
    }
}
