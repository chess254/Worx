<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$regex = ['/(\+?254|0){1}[7]{1}([0-2]{1}[0-9]{1}|[9]{1}[0-2]{1})[0-9]{6}/' => "/(\+?254|0){1}[7]{1}([0-2]{1}[0-9]{1}|[9]{1}[0-2]{1})[0-9]{6}/"];

$factory->define(User::class, function (Faker $faker) {

    $firstname = $faker->firstName($gender = 'male'|'female');
    $lastname= $faker->lastName;
    return [
        'name' => $firstname,
        'second_name' =>$lastname, 
        'middle_name' =>$faker->firstName($gender ='male'|'female'),
        'email' => strtolower(str_replace(' ','', $firstname))."@".strtolower(str_replace(' ','', $lastname)).".co.ke",
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'role'=>$faker->randomElement(['0', '1', '2']),
        'user_type_id'=>$faker->randomElement([1,2]),
        'date_of_birth'=>$faker->date($format = 'Y-m-d', $max = '1998-01-01'),
        'gender'=>$faker->randomElement(['M','F']),
        'is_active'=>$faker->randomElement([0,1]),
        'phone'=>$faker->regexify('/(\+?254|0){1}[7]{1}([0-2]{1}[0-9]{1}|[9]{1}[0-2]{1})[0-9]{6}/'),
        'city'=>$faker->city,
        'county_id'=>$faker->numberBetween(1,47),
        'country'=>'Kenya',
        'website'=>strtolower(str_replace(' ','', $firstname))."-".strtolower(str_replace(' ','', $lastname)).".co.ke",
        'address'=>$faker->address(),
        'email_notification_active'=>$faker->randomElement([0,1]),
        'user_image'=>'no_image.jpg',
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
