<?php

use App\User;
use MaxTor\MXTCore\Models\Menu;
use MaxTor\MXTCore\Models\MenuType;
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

$factory->define(MenuType::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->name,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
    ];
});