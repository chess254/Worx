<?php

use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\JobType', 3)->create();
        DB::table('job_type')->insert(array(
            array('job_type'=>'Part Time'),
            array('job_type'=>'Full Time'),
            array('job_type'=>'Remote'),
        ));
    }
}
