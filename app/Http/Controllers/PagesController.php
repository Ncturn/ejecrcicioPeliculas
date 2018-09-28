<?php

namespace App\Http\Controllers;
use App\Pelicula;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $peliculas = Pelicula::all();
        return view('welcome',[
            'peliculas' => $peliculas
        ]);
    }
}
