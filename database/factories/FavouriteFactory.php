<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favourite;
use Faker\Generator as Faker;

$factory->define(Favourite::class, function (Faker $faker) {
    return [
        'seeker_profile_id' => $faker->numberBetween(1, 100),
        'job_id' => $faker->numberBetween(1,2000),
    ];
});
