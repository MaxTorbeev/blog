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
        'name' => $name = $faker->name,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'created_by_user_id' => function(){
            return factory(User::class)->create()->id;
        }
    ];
});