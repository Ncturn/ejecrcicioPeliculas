@extends('layouts.app')
@section('content')
    @foreach ($peliculas as $pelicula)   
    <div class="post">
        <article>
            <div class="thumb">
            <div class="info">
            <h3>{{$pelicula->titulo}}</h3>
                <p class="fecha">{{$pelicula->fecha}}<p>
            </div>
                <a href="">
                    <img class="desvanecer" src="{{$pelicula->poster}}" alt="">
                </a>
            </div>
        </article>
    </div>
    @endforeach
@endsection
