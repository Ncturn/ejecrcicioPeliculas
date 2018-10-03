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
    <div class="container mt-3">
        <div class="row">
        <h3 class="col-12">Comentarios</h3>
        @forelse ($movie->commentsFor as $comment)
            
            <h5 class="font-weight-bold col-10">{{$comment->user_id}}</h5>
            <p class="text-muted text-right col-2">{{$comment->created_at}}</p>
            <p class="text-justify">&nbsp;  {{$comment->comment}}</p>
            <br/>
            <br/> 
           
        @empty
            <h3>Ningun comentario en esta Pelicula</h3>
        @endforelse
        </div>    
    </div>   
@endsection
  