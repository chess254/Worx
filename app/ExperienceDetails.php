<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceDetails extends Model
{
    protected $table = 'experience_details';
    protected $guarded = [];

    public function seekerProfile(){
        return $this->belongsTo(\App\SeekerProfile::class);
    }
}
