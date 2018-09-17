<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_categories')->insert([
                [
                    'slug' => 'uncategorised',
                    'name' => 'Категория не указана',
                    'created_by_user_id' => 1
                ]
            ]
        );
    }
}
