<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SeekerProfile;
use Faker\Generator as Faker;

$factory->define(SeekerProfile::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween(1, 100)
    ];
});
