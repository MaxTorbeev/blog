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
                'label' => 'Супер пользователь',
                'created_user_id' => 1
            ],
            [
                'name' => 'editor',
                'label' => 'Редактор',
                'created_user_id' => 1
            ],
            [
                'name' => 'register',
                'label' => 'Зарегистрированный пользователь',
                'created_user_id' => 1
            ],
        ]);
    }
}
