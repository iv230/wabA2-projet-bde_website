<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Article;
use App\Category;

$factory->define(Article::class, function (Faker $faker) {
    $categories = Category::all();
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'categoryId' => $faker->numberBetween(1, count($categories)),
    ];
});
