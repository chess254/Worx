<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favourite;

class Job extends Model
{
    protected $table = 'jobs';
    protected $dates= ['created_date', 'deadline'];

    // protected $fillable = [
    //     'title',
    //     'posted_by_id',
    //     'type_id',
    //     'company_id',
    //     'company_name_hidden',
    //     'no_of_positions',
    //     'created_date',
    //     'description',
    //     'location_id',
    //     'is_active',
    //     'salary_range',
    //     'deadline',
    //     'responsibilities',
    //     'requirements',
    //     'education',
    //     'image'
    // ];

    protected $guarded = [];

    //job belongs to one user, foreign key 'posted_by_id' points to id on users table
    public function user()
    {
        return $this->belongsTo(\App\User::class,);
    }

    //job belongs to one location, foreign key'job_location_id' points to id on location table
    public function location(){

        return $this->belongsTo(\App\JobLocation::class);
    }

    public function company(){
        return $this->belongsTo(\App\Company::class);
    }

    public function type(){
        return $this->belongsTo(\App\JobType::class);
    }

    public function county(){
        return $this->belongsTo(\App\County::class);
    }

    public function businessStream(){
        return $this->belongsTo(\App\BusinessStream::class);
    }

    public function jobFunction(){
        return $this->belongsTo(\App\JobFunction::class);
    }

    public function applications(){
        return $this->hasMany(\App\Application::class);
    }

    public function favourited_by()
    {
        return $this->belongsToMany(SeekerProfile::class, 'favourites')->withTimeStamps();
    }

    public function interview(){
        return $this->belongsTo(\App\Interview::class);
    }

        /**
     * Determine whether a job has been marked as favorite by a seeker.
     *
     * @return boolean
     */
    public function favorited()
    {
        return (bool) Favorite::where('seeker_id', Auth::user()->seekerProfile()->id)
                            ->where('job_id', $this->id)
                            ->first();
    }
}
