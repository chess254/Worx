<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function seekerProfiles(){
        return $this->hasMany(\App\SeekerProfile::class);
    }

    public function job(){
        return $this->belongsTo(\App\Job::class);
    }
}
