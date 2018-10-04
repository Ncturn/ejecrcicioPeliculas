<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMovieRequest;
use App\Movie;
use App\User;

class MoviesController extends Controller
{
    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie,
        ]);

    }

    public function patch(Movie $movie)
    {
        return view('movies.patch', [
            'movie' => $movie,
        ]);

    }

    public function form()
    {
        return view('movies.form');
    }

    public function create(CreateMovieRequest $request)
    {   
        $poster = $request->file('poster');

        $movie = Movie::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'synopsis' => $request->input('synopsis'),
            'review' => $request->input('review'),
            'poster' => $poster->store('posters', 'public')
        ]);

        return redirect('/movies/'.$movie->id);
    }
}
