<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(\App\Company::class);
    }
    public function job(){
        return $this->belongsTo(\App\Job::class);
    }
    public function seeker_profiles(){
        return $this->belongsToMany(\App\SeekerProfile::class)
        ->withPivot('start_time', 'end_time', 'status')
        ->withTimestamps();
    }

    public function application(){
        return $this->belongsTo(\App\Application::class);
    }

}
