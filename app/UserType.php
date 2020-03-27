<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';

    public function user(){
        return $this->hasMany(\App\User::class);
    }
}
