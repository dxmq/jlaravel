<?php

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(\App\Models\Topic::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});