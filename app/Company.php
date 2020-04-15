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
    protected $casts = ['services'=>'array'];

    public function jobs(){
        return $this->hasMany(\App\Job::class);
    }

    public function county(){
        return $this->belongsTo(\App\County::class);
    }

    public function businessStream(){
        return $this->belongsTo(\App\BusinessStream::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
