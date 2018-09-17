<?php

use App\User;
use MaxTor\Content\Models\Post;
use MaxTor\Content\Models\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,

        'full_text' => $faker->paragraph,

        'category_id' =>  function(){
            return factory(Category::class)->create()->id;
        },

        'created_by_user_id' => function(){
            return factory(User::class)->create()->id;
        }
    ];
});