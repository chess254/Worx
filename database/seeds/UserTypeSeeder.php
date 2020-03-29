<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\UserType', 2)->create();
        DB::table('user_type')->insert(array(
            array('name'=>'Seeker'),
            array('name'=>'Employer')
        ));
    }
}
