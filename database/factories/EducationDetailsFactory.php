<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EducationDetails;
use Faker\Generator as Faker;

$factory->define(EducationDetails::class, function (Faker $faker) {
    return [
        'seeker_profile_id'=> $faker->numberBetween(1,100),
        'certificate'=>$faker->randomElement(['High School','Certificate','Diploma','Degree','Post-Graduate Degree','Masters','Doctorate']),
        'institute'=>$faker->randomElement(['UON','Testimony school','Progress Flight Academy','FSK','Kabarak University','Arya','Alliance Francais']),
        'grade'=>$faker->randomElement(['A', 'B','C','D','E']),
    ];
});
