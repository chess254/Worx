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
        factory('App\BusinessStream', 10)->create();
    }
}
