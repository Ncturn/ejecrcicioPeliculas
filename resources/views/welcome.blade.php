@extends('layouts.app')
@section('content')
<div class="container">
    <article class="row">
    @foreach ($movies as $pelicula)   
    
        
            <div class="col-12 align-self-center col-lg-3">
            <h3>{{$pelicula->titulo}}</h3>
                <p class="fecha">{{$pelicula->fecha}}<p>
                <a href="">
                    <img class="desvanecer" src="{{$pelicula->poster}}" alt="">
                </a>
            </div>
        
    
    @endforeach
    </article>
</div>
@endsection
