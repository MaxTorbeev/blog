<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Posts\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'title'     => $faker->title,
        'alias'     => $faker->title,
        'intro_text' => $faker->paragraph(1),
        'full_text'  => $faker->paragraph(3),
        'created_user_id' => $faker->randomDigit,
        'metakey'   => $faker->text,
        'metadesc'  => $faker->text,
        'metadata'  => $faker->text,
    ];

});

