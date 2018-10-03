@extends('layouts.app')
@section('content')
<div class="container">
    <article class="row">
    @foreach ($movies as $movie)   
    
        
            <div class="col-12 align-self-center col-lg-3 mb-4">
            <h3>{{$movie->title}}</h3>
                <p class="fecha">{{$movie->date}}<p>
                <a href="/movies/{{$movie->id}}">
                    <img class="img-thumbnail" src="{{$movie->poster}}" alt="">
                </a>
            </div>
        
    
    @endforeach
    @if (count($movies))
        <div class="mt-4 mx-auto">
            {{$movies->links()}}
        </div>
    @endif
    </article>
</div>
@endsection
