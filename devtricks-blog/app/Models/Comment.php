<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    function users(){
        return $this->belongsTo('App\models\Users','user_id','id');
    }
    function news(){
        return $this->belongsTo('App\models\News','news_id','id');
    }
}
