<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function commentsFor()
    {
        return $this->hasMany(Comment::class);
    }

    public function casters()
    {
        return $this->belongsToMany(User::class, 'comments', 'movie_id', 'user_id');
    }
}
