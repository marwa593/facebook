<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsto('app\Models\Post');
    }
    // public function user()
    // {
    //     return $this->belongsto('app\Models\User');
    // }

    // /**
    //  * Get the post associated with the Comment
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function post()
    // {
    //     return $this->hasOne(Post::class, 'id', 'post_id');
    // }
}
