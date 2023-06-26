<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_category_news extends Model
{
    use HasFactory;
    protected $table ="post_category_news";
    protected $fillable = [
        'post_id',
        'category_id'
    ];
    public $timestamps = false;
    public function category(){

    }
    public function posts(){
        
    } 
}
