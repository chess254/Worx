<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Interview extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(\App\Company::class);
    }
    public function job(){
        return $this->belongsTo(\App\Job::class);
    }
    public function seeker_profiles(){
        return $this->belongsToMany(\App\SeekerProfile::class)
        ->withPivot('start_time', 'end_time', 'status')
        ->withTimestamps();
    }

    public function application(){
        return $this->belongsTo(\App\Application::class);
    }

    public static function makeFromApplication(Application $application): self
    {
        // $application = Application::find($request->application_id)->first();
        return self::make([
            'job_id' => $application->job_id,
            'application_id' => $application->id,
            'company_id' => $application->company_id,
        ]);
    }

        /**
     * Make a new BlogPost object from the given User object and save it to the database.
     */
    public static function createFromApplication(Application $application, \DateTime $start_time, \DateTime $end_time)
    {
        tap(self::makeFromApplication($application))->save()->seeker_profiles()->attach($application->applicant_id,['start_time'=> $start_time , 'end_time'=> $end_time , 'status'=> $application->status]);
    }

}
