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

    public function comments()
    {
        return $this->hasMany('app\Models\Comment');
    }

    
}
