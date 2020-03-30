<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    // protected $fillable = [
    //     'company_name',
    //     'profile_description',
    //     'business_stream_id',	
    //     'establishment_date',	
    //     'company_website_url',
    // ];

    protected $guarded = [];

    public function job(){
        return $this->hasMany(\App\Job::class);
    }

    public function businessStream(){
        return $this->belongsTo(\App\BusinessStream::class);
    }
}
