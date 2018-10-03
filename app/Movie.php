<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    public function commentsFor()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function casters()
    {
        return $this->belongsToMany(User::class, 'comments', 'movie_id', 'user_id');
    }

    public function getPosterAttribute($poster)
    {
        if(!$poster || starts_with($poster, 'http'))
        {
            return $poster;
        }

        return \Storage::disk('public')->url($poster);
    }
}
