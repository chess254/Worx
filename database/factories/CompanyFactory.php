<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $companyname = $faker->unique()->company;
    $cmpnyname = str_replace(' ', '',$companyname);
    $skills = [
        '.Net',
        '3D Modelling',
        'Android',
        'AngularJS',
        'Animation',
        'Blog Writing',
        'Business Coaching',
        'Business Plans',
        'CPlus (C++)',
        'CSS3',
        'Company Incorporation',
        'Compositing',
        'Copywriting',
        'Design',
        'Event Planning',
        'Filing Tax Returns',
        'Flash',
        'Geographic Information System (GIS)',
        'HTML5',
        'Java',
        'Javascript',
        'Joomla',
        'Lead Generation',
        'Legal Advisory Services',
        'Legal Research &amp; Writing',
        'Market Research',
        'MySQL',
        'Network Design &amp; Configuration',
        'NodeJS',
        'Objective C/iOS',
        'PHP',
        'Photoshop',
        'PostgreSQL',
        'Project Management',
        'Public Relations',
        'Python',
        'QuickBooks',
        'ReactJS',
        'Recruitment',
        'Reporting writing',
        'Ruby',
        'SMS',
        'Social Media Marketing',
        'Swift/iOS',
        'System Admin - Linux',
        'System Admin - Windows',
        'Systems Security',
        'Translation',
        'USSD',
        'WordPress',
        'Writing articles'
        
        ];

        
    return [
        'email'=>"info@".$cmpnyname.".co.ke",
        'user_id'=>$faker->numberbetween(1,100),
        'name'=>$companyname,
        'description'=>$faker->paragraph($nbSentences = 30, $variableNbSentences = true),
        'business_stream_id'=>$faker->numberBetween(1,30),
        'website'=>"www.".$companyname."co.ke",
        'services'=> array($skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)]),
        'county_id' =>$faker->numberBetween(1, 47),
        'city'=>$faker->city,
        'country'=>'Kenya',
        'mobile'=>$faker->regexify('/(\+?254|0){1}[7]{1}([0-2]{1}[0-9]{1}|[9]{1}[0-2]{1})[0-9]{6}/'),
        'landline'=>"020-".$faker->numberbetween(11111,99999),
        'facebook'=>"facebook.com/".$cmpnyname,
        'twitter'=>"twitter.com/".$cmpnyname,
        'linked_in'=>"linkedIn.com/".$cmpnyname,
        'number_of_employees'=>$faker->numberbetween(1,900),
        'date_of_formation'=>$faker->date($format = 'Y-m-d', $max = '2020-01-01')

    ];
});
