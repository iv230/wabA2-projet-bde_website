<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment as Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'autor' => $faker->firstName,
    	'comment_content' => $faker->text,
    	'id_event' => 1,
    	'comment_date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = 'Europe/Paris'),
    ];
});
