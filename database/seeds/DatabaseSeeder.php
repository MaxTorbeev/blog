<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ExtensionsTableSeeder::class);
        $this->call(MainMenuTypeTableSeeder::class);

        DB::table('posts_categories')->insert([
            'title'             => 'Uncategories',
            'alias'             => 'uncategories',
            'created_user_id'   => '1'
        ]);

        DB::table('posts')->insert([
            'title'             => 'Welcom to Maxtor Blog',
            'alias'             => 'welcom',
            'intro_text'        => 'Добро пожаловать в maxtor blog alpha 1',
            'full_text'         => 'uncategories',
            'created_user_id'   => '1'
        ]);
    }
}
