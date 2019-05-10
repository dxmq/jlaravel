<?php

use Faker\Generator as Faker;
use App\Models\Post;

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
        'title' => $faker->sentence(mt_rand(3, 5)),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'updated_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'user_id' => 1,
    ];
});