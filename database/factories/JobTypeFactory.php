<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobType;
use Faker\Generator as Faker;

$factory->define(JobType::class, function (Faker $faker) {
    return [
        'job_type' => $faker->randomElement(['Full Time', 'Part Time', 'Remote'])
    ];
});
