@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12">Titulo: {{$movie->titulo}}</h1>
            <h3 class="col-12">Fecha de estreno: {{$movie->fecha}}</h3>
            <img class="col-6" src="{{$movie->poster}}" alt="">
            <p class="col-6">Sinopsis:<br/> {{$movie->sinopsis}} <br/><br/>
                Reseña:<br/> {{$movie->resena}}
            </p>
    
        </div>
    </div>   
    @endsection
  