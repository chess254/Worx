<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SeekerProfile;
use Faker\Generator as Faker;





$factory->define(SeekerProfile::class, function (Faker $faker) {

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
        'user_id' => $faker->unique()->numberBetween(1, 100),
        // 'skills' => json_encode("[$faker->randomElement(['php', 'ajax', 'laravel', 'mySql']), $faker->randomElement(['php', 'ajax', 'laravel', 'mySql']), $faker->randomElement(['php', 'ajax', 'laravel', 'mySql'])]" )
        'skills'=>array($skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)],$skills[array_rand($skills)]),
        'title'=>$faker->randomElement(['Computer Scientist',
            'IT Professional',
            'UX Designer & UI Developer',
            'SQL Developer',
            'Web Designer',
            'Web Developer',
            'Help Desk Worker/Desktop Support',
            'Software Engineer',
            'Data Entry',
            'DevOps Engineer',
            'Computer Programmer',
            'Network Administrator',
            'Information Security Analyst',
            'Artificial Intelligence Engineer',
            'Cloud Architect',
            'IT Manager',
            'Technical Specialist',
            'Application Developer',
            'Chief Technology Officer (CTO)',
            'Chief Information Officer (CIO)'
        ]),
        'highest_qualification'=>$faker->randomElement(['High School', 'Certificate', 'Diploma', 'Degree', 'Post Graduate Diploma', 'Masters', 'PhD']),
        'bio'=>$faker->paragraphs($nb = 3, $asText = true),
    ];
});
