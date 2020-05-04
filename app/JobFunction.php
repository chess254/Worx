<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobFunction extends Model
{
 protected $table = 'job_function'; //so that eloquent doest look for job_functions table as per convention

    public function jobs(){
        return $this->hasmany(Job::class);
    }
}
