<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";

    function project_types(){
        return $this->belongsTo('App\models\Project_types','project_type_id','id');
    }
}
