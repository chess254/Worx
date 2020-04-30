<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SeekerProfile extends Model implements HasMedia
{

    
    use InteractsWithMedia;

    protected $table = 'seeker_profile';
    protected $guarded = [];
    protected $casts = ['skills' => 'array'];

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
        return $this->hasMany(\App\EducationDetails::class);
    }

    public function experienceDetails(){
        return $this->hasMany(\App\ExperienceDetails::class);
    }
}
