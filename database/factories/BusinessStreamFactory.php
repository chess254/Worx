<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BusinessStream;
use Faker\Generator as Faker;

$factory->define(BusinessStream::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(['Ict', 'Commerce','Finance','Engineering','Entertainment','Education','Media','Security','Research'])
    ];
});
