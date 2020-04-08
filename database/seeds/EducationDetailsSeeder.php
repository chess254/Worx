<?php

use Illuminate\Database\Seeder;

class EducationDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\EducationDetails', 600)->create();
    }
}
