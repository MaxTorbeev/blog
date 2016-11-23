<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id'                => '1',
                'name'              => 'maxtor',
                'email'             => 'MXTSoftProw@yandex.ru',
                'password'          => '$2y$10$nHYaZPh.2bqnllitCYLftOCa5pftzQhqQf4b4HOa8U3w6Q7HS7Wxq' //MaxTor
            ]
        );
    }
}
