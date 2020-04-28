<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SeekerProfile extends Model implements HasMedia
{

    
    use InteractsWithMedia;

    protected $table = 'seeker_profile';
    protected $guarded = [];
    protected $casts = ['skills' => 'array'];

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
