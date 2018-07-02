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
                'name' => 'show_posts',
                'label' => 'Просмотр постов'
            ],
            [
                'name' => 'create_posts',
                'label' => 'Создание постов'
            ],
            [
                'name' => 'delete_posts',
                'label' => 'Удаление постов'
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
