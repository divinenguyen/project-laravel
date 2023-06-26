<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_tag_news extends Model
{
    use HasFactory;
    protected $table ="post_tag_news";
    public $timestamps = false;
}
