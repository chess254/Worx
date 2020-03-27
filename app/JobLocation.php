<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    protected $table = 'job_location';

    public function job(){
        return $this->hasMany(\App\Job::class);
    }
}
