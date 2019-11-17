<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Events as Events;
use Faker\Generator as Faker;

$factory->define(Events::class, function (Faker $faker) {
    return [
    	'name' => $faker->text,
    	'description' => $faker->text,
    	'location' => $faker->address,
    	'recurrence' => $faker->text,
    	'state' => $faker->boolean,
        'price' => $faker->numberBetween(20, 100),
        'date_event' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = 'Europe/Paris'),
        'time_event' => $faker->time($format = 'H:i')
    ];
});
