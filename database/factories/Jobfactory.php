<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;
// use App\User;

$factory->define(Job::class, function (Faker $faker) {

    //get all users with user_type_id == 2 (ensure job belongs to an employer)
        $employeeArray = [];        
        $users2 = \App\User::where('user_type_id', 2)->get()->toArray();   
        foreach($users2 as $user){
            array_push($employeeArray,$user['id']);
        }

    //select a random user id from that list and assign to $user_id for this job
        $user_id=$faker->randomElement($employeeArray);

    //get an array of company_id all companies belonging to user_id (ensure company belongs to this user)
        $compArray = [];        
        $Companies=[];
        while($Companies == []){
            $user_id= $faker->randomElement($employeeArray);
            $Companies = \App\Company::where('user_id', $user_id)->get()->toArray();
        }
    //        
        foreach($Companies as $company){
            array_push($compArray,$company['id']);
        }
    //select random company_id from that array and assign to $company_id for this job (ensure that job belongs to company posted by this user who is an employer)

        $company_id = $faker->randomElement($compArray);


   

    return [
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
        'user_id' => $user_id,
        'type_id' =>$faker->numberBetween(1,3),
        'business_stream_id' =>$faker->numberBetween(1,30),
        'county_id' =>$faker->numberBetween(1, 47),
        // 'company_id'=>$faker->numberBetween(1,200),
        'company_id'=> $company_id,
        'company_name_hidden' =>$faker->numberBetween(1,2),
        'no_of_positions' =>$faker->numberBetween(1,10),
        'created_date' =>$faker->date($format = 'Y-m-d', $max = '2020-01-01'), // '1979-06-09',
        'description'=>$faker->paragraph($nb=2, $nbSentences = 3, $variableNbSentences = true),
        'location_id'=>$faker->numberBetween(1,20),
        'is_active'=>$faker->numberBetween(1,2),
        'salary_range'=>'1,000 - 1,000,000',
        'deadline'=>'2020-06-09',
        'responsibilities' =>$faker->paragraph($nb=2, $nbSentences = 1, $variableNbSentences = true),
        'requirements' =>$faker->paragraph($nb=2, $nbSentences = 1, $variableNbSentences = true),
        'education'  =>$faker->randomElement(['High School','Certificate','Diploma','Degree','Post-Graduate Degree','Masters','Doctorate']),
        'image' =>'no_image.jpg',
        'email' => $faker->unique()->safeEmail,
        'town' =>$faker->city,

    ];
    
});
