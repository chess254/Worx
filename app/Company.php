<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

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

    public function registerMediaConversions (Media $media = null) : void
    {
        $this->addMediaConversion('square')
            ->width(300)
            ->height(300);
            
    }

    public function registerMediaCollections(): void {
        $this -> addMediaCollection('logos')->singleFile();
    }

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
