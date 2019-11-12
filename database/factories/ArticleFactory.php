<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'image' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
        'purchaseNumber' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'stock' => $faker->randomNumber($nbDigits = 1, $strict = false, $min = 0, $max = 1),
        'category' => $faker->name,
    ];
});
