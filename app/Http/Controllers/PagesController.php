<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $movies = Movie::all();
        return view('welcome',[
            'movies' => $movies
        ]);
    }
}
