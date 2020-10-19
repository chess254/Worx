<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Url\Url;

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
    // protected $casts = ['services'=>'array'];
    protected $casts = ['services'=>'array'];
    protected $dates = ['date_of_formation'];

        // think about removing this method in favour of the one below 
    public function getLogo(){

        // $url = Url::fromString('https://spatie.be:8000/opensource/12324/232131321/123213213/231-123123.jpg');

        $urlstring = Url::fromString($this->getFirstMediaUrl('logos','square'))->getPath();
        // dd($url->getPath(), $urlstring);
        return $this->getFirstMediaUrl('logos','square') ? url($urlstring) :  url('/storage/no_logo.png');
    }

    public function getCompanyLogoAttribute()
    {           $urlstring = Url::fromString($this->getFirstMediaUrl('logos','square'))->getPath();

        return $this->getFirstMediaUrl('logos','square') ? url($urlstring) :  url('/storage/no_logo.png');
    }

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

    public function applications(){
        return $this->hasMany(\App\Application::class);
    }

    public function interviews(){
        return $this->hasMany(\App\Interview::class);
    }
}
