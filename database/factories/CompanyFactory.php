<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->company,
        'description'=>$faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'business_stream_id'=>$faker->numberBetween(1,30),
        'website'=>$faker->url,
    ];
});
