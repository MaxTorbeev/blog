<?php

use App\User;
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

$factory->define(Category::class, function (Faker $faker) {
    return [
        'created_user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'note' => $faker->paragraph(),
    ];
});