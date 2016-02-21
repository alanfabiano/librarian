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
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Authors::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'active' => $faker->boolean,
        'biography' => $faker->paragraph($maxNbChars = 30)
    ];
});

$factory->define(App\Books::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'active' => $faker->boolean,
        'resume' => implode("\r\n",$faker->paragraphs($nb = 15))
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => $faker->boolean
    ];
});