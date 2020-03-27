<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'posted_by_id' => $faker->numberBetween(1,9),
        'job_type_id' =>$faker->numberBetween(1,2),
        'company_id'=>$faker->numberBetween(1,2),
        'is_company_name_hidden' =>$faker->numberBetween(1,2),
        'created_date' =>$faker->date,
        'job_description'=>$faker->numberBetween(1,2),
        'job_location_id'=>$faker->numberBetween(1,2),
        'is_active'=>$faker->numberBetween(1,2),
    ];
    
});
