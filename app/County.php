<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{

    protected $guarded = [];

    public function jobs(){
        return $this->hasMany(\App\Job::class);
    }

    
}
