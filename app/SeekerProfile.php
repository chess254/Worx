<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    protected $table = 'seeker_profile';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function educationDetails(){
        return $this->hasMany(\App\EducationDetails::class);
    }

    public function experienceDetails(){
        return $this->hasMany(\App\ExperienceDetails::class);
    }
}
