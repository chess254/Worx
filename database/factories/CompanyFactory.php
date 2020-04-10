<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $companyname = $faker->unique()->company;
    return [
        'email'=>"info@".$companyname."co.ke",
        'user_id'=>$faker->numberbetween(1,100),
        'name'=>$companyname,
        'description'=>$faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'business_stream_id'=>$faker->numberBetween(1,30),
        'website'=>"www.".$companyname."co.ke",
    ];
});
