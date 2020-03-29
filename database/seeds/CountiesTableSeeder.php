<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counties')->insert(array(
            array('county_name'=> 'MOMBASA'),
            array('county_name'=> 'KWALE'),
            array('county_name'=> 'KILIFI'),
            array( 'county_name'=> 'TANA RIVER'),
            array('county_name'=> 'LAMU'),
            array( 'county_name'=> 'TAITA TAVETA'),
            array('county_name'=> 'GARISSA'),
            array('county_name'=> 'WAJIR'),
            array('county_name'=> 'MANDERA'),
            array( 'county_name'=> 'MARSABIT'),   
            array( 'county_name'=> 'ISIOLO'),   
            array( 'county_name'=> 'MERU'),   
            array( 'county_name'=> 'THARAKA-NITHI'),   
            array( 'county_name'=> 'EMBU'),   
            array( 'county_name'=> 'KITUI'),   
            array( 'county_name'=> 'MACHAKOS'),   
            array( 'county_name'=> 'MAKUENI'),   
            array( 'county_name'=> 'NYANDARUA'),   
            array( 'county_name'=> 'NYERI'),   
            array( 'county_name'=> 'KIRINYAGA'),   
            array( 'county_name'=> 'MURANGA'),   
            array( 'county_name'=> 'KIAMBU'),   
            array( 'county_name'=> 'TURKANA'),   
            array( 'county_name'=> 'WEST POKOT'),   
            array( 'county_name'=> 'SAMBURU'),   
            array( 'county_name'=> 'TRANS NZOIA'),   
            array( 'county_name'=> 'UASIN GISHU'),   
            array( 'county_name'=> 'ELGEYO/MARAKWET'),   
            array( 'county_name'=> 'NANDI'),   
            array( 'county_name'=> 'BARINGO'),   
            array( 'county_name'=> 'LAIKIPIA'),   
            array( 'county_name'=> 'NAKURU'),   
            array( 'county_name'=> 'NAROK'),   
            array( 'county_name'=> 'KAJIADO'),   
            array( 'county_name'=> 'KERICHO'),   
            array( 'county_name'=> 'BOMET'),   
            array( 'county_name'=> 'KAKAMEGA'),   
            array( 'county_name'=> 'VIHIGA'),   
            array( 'county_name'=> 'BUNGOMA'),   
            array( 'county_name'=> 'BUSIA'),   
            array( 'county_name'=> 'SIAYA'),   
            array( 'county_name'=> 'KISUMU'),   
            array( 'county_name'=> 'HOMA BAY'),   
            array( 'county_name'=> 'MIGORI'),   
            array( 'county_name'=> 'KISII'),   
            array( 'county_name'=> 'NYAMIRA'),   
            array( 'county_name'=> 'NAIROBI'),    
       ));
    }
}
