<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'posted_by_id',
        'type_id',
        'company_id',
        'company_name_hidden',
        'no_of_positions',
        'created_date',
        'description',
        'location_id',
        'is_active',
        'salary_range',
        'deadline',
        'responsibilities',
        'education',
        'image'
    ];

    //job belongs to one user, foreign key 'posted_by_id' points to id on users table
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'posted_by_id');
    }

    //job belongs to one location, foreign key'job_location_id' points to id on location table
    public function location(){

        return $this->belongsTo(\App\JobLocation::class,'job_location_id');
    }

    public function company(){
        return $this->belongsTo(\App\Company::class,'company_id');
    }

    public function type(){
        return $this->belongsTo(\App\JobType::class,'job_type_id');
    }

    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id');
    // }
}
