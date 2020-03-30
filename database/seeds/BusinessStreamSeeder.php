<?php

use Illuminate\Database\Seeder;

class BusinessStreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\BusinessStream', 10)->create();

        DB::table('business_stream')->insert(array(
            array('name'=>'Advertising & Marketing'),
            array('name'=>'Agriculture, Fishing & Forestry'),
            array('name'=>'Administration'),
            array('name'=>'Art, Design & Entertainment'),
            array('name'=>'Automotive & Aviation'),
            array('name'=>'Accounting, Banking, Finance & Insurance'),
            array('name'=>'Business and Management'),
            array('name'=>'Community and social services, non-profits'),
            array('name'=>'Construction'),
            array('name'=>'Digital, Media & Communications'),
            array('name'=>'Education & Training'),
            array('name'=>'Energy & Utilities'),
            array('name'=>'Government'),
            array('name'=>'Handyman and Construction'),
            array('name'=>'Healthcare & Wellbeing'),
            array('name'=>'Hospitality, Travel, Food and Restaurants & Hotel'),
            array('name'=>'Human Resources'),
            array('name'=>'ICT, Software & Telecommunications'),
            array('name'=>'Law Enforcement, Legal & Security'),
            array('name'=>'Logistics & Transportation'),
            array('name'=>'Manufacturing & Engineering'),
            array('name'=>'Media and Languages'),
            array('name'=>'Mining, Oil & Metals'),
            array('name'=>'NGO'),
            array('name'=>'Real Estate'),
            array('name'=>'Recruitment'),
            array('name'=>'Retail, Fashion & FMCG'),
            array('name'=>'Sales and Marketing'),
            array('name'=>'Security'),
            array('name'=>'Teaching, Research & Academy'),
        ));

    }
}
