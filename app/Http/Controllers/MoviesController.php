<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use app\User;

class MoviesController extends Controller
{
    public function show(Movie $movie){

        $movie_comments = $movie->comments();
        return view('movies.show', [
            'movie' => $movie,
            'movie_comments' => $movie_comments,
        ]);

    }
}
