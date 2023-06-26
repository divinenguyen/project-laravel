<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    use HasFactory;
    protected $table = "post_category";

    public function children()
    {
      return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
      return $this->belongsTo(self::class, 'parent_id');
    }
}
