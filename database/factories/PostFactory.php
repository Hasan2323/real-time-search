<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence,
        'content' => $faker->text(200),
        'image' => $faker->imageUrl(640, 480),
        'status' => rand(0,1),
    ];
});
