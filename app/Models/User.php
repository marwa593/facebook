<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model  implements Authenticatable
{

    use \Illuminate\Auth\Authenticatable;
    protected $table = 'users';

    public function posts()
    {
        return $this->hasMany('app\Models\Post');
    }

    // /**
    //  * Get all of the comments for the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
    //  */
    // public function comments()
    // {
    //     return $this->hasManyThrough(Comment::class, Post::class);
    // }

}
