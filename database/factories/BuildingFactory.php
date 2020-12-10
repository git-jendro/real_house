<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Building;
use Faker\Generator as Faker;

$factory->define(Building::class, function (Faker $faker) {
    return [
        'nama' => $faker->streetSuffix,
        'project_id' => $faker->randomDigitNotNull,
        'lantai' => $faker->numberBetween($min = 1, $max = 99),
        'luas' => $faker->numberBetween($min = 1000, $max = 9000),
        'deskripsi' => $faker->sentence,
    ];
});
