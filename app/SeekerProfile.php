<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Url\Url;


class SeekerProfile extends Model implements HasMedia
{

    
    use InteractsWithMedia;

    protected $table = 'seeker_profile';
    protected $guarded = [];
    protected $casts = ['skills' => 'array'];
   


    //return no image placeholder if user has not uploaded profile pic
    public function getProfilePic(){
        $urlstring = Url::fromString($this->getFirstMediaUrl('profilepics'))->getPath();
        return $this->getFirstMediaUrl('profilepics') ? url($urlstring) :  url('storage/no_profile_pic.png');
    }

    //from spatie
    public function registerMediaConversions (Media $media = null) : void
    {
        $this->addMediaConversion('thumb')
            ->width(250)
            ->height(250);
            
    }

    public function registerMediaCollections(): void {
        $this -> addMediaCollection('profilepics')->singleFile();
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function educationDetails(){
        return $this->hasMany(\App\EducationDetails::class)->orderBy('completion_date','DESC');
    }

    public function experienceDetails(){
        return $this->hasMany(\App\ExperienceDetails::class)->orderBy('end_date', 'DESC');
    }

    public function favourite_jobs()
    {
        return $this->belongsToMany(Job::class, 'favourites')->withTimeStamps();
    }
}
