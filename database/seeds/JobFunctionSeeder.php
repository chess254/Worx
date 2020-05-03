<?php

use Illuminate\Database\Seeder;

class JobFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_function')->insert(array(
            array('name'=>'Accounting, Auditing & Finance'),
            array('name'=>'Administrative & Office'),
            array('name'=>'Agriculture & Farming'),
            array('name'=>'Building & Architecture'),
            array('name'=>'Community & Social Services'),
            array('name'=>'Consulting & Strategy'),
            array('name'=>'Creative & Design'),
            array('name'=>'Customer Service & Support'),
            array('name'=>'Employability & Soft Skills'),
            array('name'=>'Engineering'),
            array('name'=>'Food Services & Catering'),
            array('name'=>'Health & Safety'),
            array('name'=>'Hospitality/Leisure/Travel'),
            array('name'=>'Human Resources'),
            array('name'=>'IT & Software'),
            array('name'=>'Legal Services'),
            array('name'=>'Management & Business Development'),
            array('name'=>'Marketing & Communications'),
            array('name'=>'Medical & Pharmaceutical'),
            array('name'=>'Natural Sciences'),
            array('name'=>'Other'),
            array('name'=>'Project & Product Management'),
            array('name'=>'Quality Control & Assurance '),
            array('name'=>'Real Estate & Property Management'),
            array('name'=>'Research, Teaching & Training'),
            array('name'=>'Sales'),
            array('name'=>'Security'),
            array('name'=>'Supply Chain & Procurement'),
            array('name'=>'Trades & Services'),
            array('name'=>'Transport & Logistics'),
        ));

    }
}
