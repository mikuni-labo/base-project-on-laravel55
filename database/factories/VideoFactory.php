<?php

use App\Model\Video;
// use Faker\Generator as Faker;

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

$factory->define(Video::class, function () {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'title' => $faker->title,
        'url'   => $faker->url,
    ];
});
