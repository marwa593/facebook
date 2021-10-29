<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsto('app\Models\User');
    }

   /**
    * Get all of the comments for the Post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function comments()
   {
    //    return $this->hasMany(Comment::class, 'post_id', 'id');
        return $this->hasMany('app\Models\Comment');
   }


}
