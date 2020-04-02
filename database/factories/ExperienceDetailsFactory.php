<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExperienceDetails;
use Faker\Generator as Faker;

$factory->define(ExperienceDetails::class, function (Faker $faker) {
    return [
        'seeker_profile_id'=> $faker->numberBetween(1,100)
    ];
});
