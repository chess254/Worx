<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobLocation;
use Faker\Generator as Faker;

$factory->define(JobLocation::class, function (Faker $faker) {
    return [
        'address'=>$faker->streetAddress,
        'city'=>$faker->city,
        'county'=>$faker->state,
        'country'=>'Kenya'

    ];
});
