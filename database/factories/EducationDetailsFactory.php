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
        'starting_date'=>$faker->date($format='Y-m-d', $max='2010-12-31'),
        'completion_date'=>$faker->date($format='Y-m-d', $max='2019-12-31'),
        'course'=>$faker->randomElement([
            'Bachelof of Business  Administration',
            'Bachelor of Commerce',
            'Computer Science',
            'Economics',
            'Software Engineering',
            'Mechanical Engineering',
            'Production Engineering',
            'Aviation',
            'English',
            'Civil Engineering',
            'Data Science',
            'Financial Engineering',
            'Medicine',
            'Veterinary medicine',
            'Acturial Science',
            'Music',
            'Nursing',
            'Philosophy',
            'Political Science',
            'History',
            'Literature',
            'Linguistics',
            'Environmental Engineering'
        ])
    ];
});
