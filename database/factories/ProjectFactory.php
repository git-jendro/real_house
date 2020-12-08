<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'nama_pt' => $faker->company,
        'nama_project' => $faker->colorName,
        'alamat' => $faker->streetAddress
    ];
});
