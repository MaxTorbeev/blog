<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'root',
                'label' => 'Супер пользователь'
            ],
            [
                'name' => 'editor',
                'label' => 'Редактор'
            ],
            [
                'name' => 'register',
                'label' => 'Зарегистрированный пользователь'
            ],
        ]);
    }
}
