<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    protected $table = 'education_details';
    protected $guarded = [];
    protected $dates= ['starting_date', 'completion_date'];


    public function seekerProfile(){
        return $this->belongsTo(\App\SeekerProfile::class);
    }
}
