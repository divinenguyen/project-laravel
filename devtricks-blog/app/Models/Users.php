<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    function news(){
        return $this->hasMany('App\models\News','user_id','id');
    }
    function comments(){
        return $this->hasMany('App\models/Comment','user_id','id');
    }
}
