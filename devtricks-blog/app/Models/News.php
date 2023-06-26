<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ="news";

    function categories(){
        return $this->belongsTo('App\models\Category','category_id','id');
    }
    function users(){
        return $this->belongsTo('App\models\Users','user_id','id');
    }
    function comments(){
        return $this->hasMany('App\models\Comment','news_id','id');
    }
}
