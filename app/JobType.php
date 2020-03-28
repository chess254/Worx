<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'job_type';

    protected $guarded = [];
    
    public function job(){
        return $this->hasMany(\App\Job::class);
    }
}
