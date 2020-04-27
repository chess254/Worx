<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable   
{
    use Notifiable;
    

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','user_type_id','date_of_birth',
        'gender','is_active','contact_number','email_notification_active',
        'sms_notification_active','user_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function job(){
        return $this->hasMany(\App\Job::class);
    }

    public function type(){
        return $this-> belongsTo(\App\UserType::class, 'user_type_id');
    }

    public function seekerProfile(){
        return $this->hasOne(\App\SeekerProfile::class);
    }

    public function companies(){
        return $this->hasMany(\App\Company::class);
    }

    public function county(){
        return $this->belongsTo(\App\County::class);
    }
}
