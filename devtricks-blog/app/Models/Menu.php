<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    //
    public function sub_menu(){
        return $this->hasMany('App\models\Menu', 'parent');
    }
}
