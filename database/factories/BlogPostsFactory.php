<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogPosts;
use Faker\Generator as Faker;

$factory->define(App\Models\BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
    $text = $faker->realText(1000, 5);
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    return [
        'title' => $title,
        'category_id' => rand(1, 10),
        'user_id' => 4,
        'slug' => str_slug($title),
        'excerpt' => $faker->text(rand(40, 100)),
        'content' => $text,
        'is_published' => $isPublished,
        'published_at' => $isPublished
            ? $faker->dateTimeBetween('-2 months', '-1 months')
            : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
