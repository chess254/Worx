<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Application extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function seekerProfiles(){
        return $this->hasMany(\App\SeekerProfile::class);
    }

    public function job(){
        return $this->belongsTo(\App\Job::class);
    }

    public function employer(){
        return $this->belongsTo(\App\User::class, 'employer_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }


    public function applicant(){
        return $this->belongsTo(\App\SeekerProfile::class);
    }
}
