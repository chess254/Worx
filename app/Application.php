<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Url\Url;

class Application extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function getCv(){
        $cvUrl = Url::fromString($this->getFirstMediaUrl('cv'))->getPath();
        return $this->getFirstMediaUrl('cv') ? url($cvUrl) : url('storage/no_profile_pic.png');
    }

    public function getCoverLetter(){
        $coverLetterUrl = Url::fromString($this->getFirstMediaUrl('cover_letter'))->getPath();
        return $this->getFirstMediaUrl('cover_letter') ? url($coverLetterUrl) : url('storage/no_profile_pic.png');
    }


    // public function getCvAttribute(){
    //     $cvUrl = Url::fromString($this->getFirstMediaUrl('cv'))->getPath();
    //     return $this->getFirstMediaUrl('cv') ? url($cvUrl) : url('storage/no_profile_pic.png');
    // }

    public function seekerProfiles(){
        return $this->hasMany(\App\SeekerProfile::class);
    }

    public function interviews(){
        return $this->hasMany(\App\Interview::class);
    }

    public function job(){
        return $this->belongsTo(\App\Job::class);
    }

    public function employer(){
        return $this->belongsTo(\App\User::class, 'employer_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }


    public function applicant(){
        return $this->belongsTo(\App\SeekerProfile::class);
    }

    public function company(){
        return $this->belongsTo(\App\Company::class);
    }

    //spatie media ..
    public function registerMediaCollections(): void {
        $this -> addMediaCollection('documents');
    
        $this -> addMediaCollection('cv');
   
        $this -> addMediaCollection('cover_letter');
    }

}
