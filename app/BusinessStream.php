<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessStream extends Model
{
    protected $table = 'business_stream';

    protected $guarded = [];

    public function companies(){
        return $this->hasMany(\App\Company::class);
    }

    public function jobs(){
        return $this->hasmany(Job::class);
    }
}
