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
//        $this->call(\MainMenuTypeTableSeeder::class);
        $this->call(\ExtensionsTableSeeder::class);
//        DB::table('posts_categories')->insert([
//            'title'             => 'Uncategories',
//            'alias'             => 'uncategories',
//            'created_user_id'    => '1'
//        ]);
    }
}
