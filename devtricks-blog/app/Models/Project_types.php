<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Project_types extends Model
{
    protected $table = "project_type";

    function project(){
        return $this->hasMany('App\models\Project','project_type_id','id');
    }
}
