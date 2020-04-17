<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Scenic;
use Faker\Generator as Faker;

$factory->define(Scenic::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'longitude' => $faker->numberBetween(0, 180),
        'latitude' => $faker->numberBetween(0, 90),
        'created_at' => strtotime($faker->time('Y-m-d')),
        'updated_at' => time(),
    ];
});
