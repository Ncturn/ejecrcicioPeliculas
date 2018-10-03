<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Movie extends Model
{
    public function commentsFor()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }
}
