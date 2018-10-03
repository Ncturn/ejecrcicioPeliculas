@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12">Titulo: {{$movie->title}}</h1>
            <h3 class="col-12">Fecha de estreno: {{$movie->date}}</h3>
            <img class="col-6 img-thumbnail" src="{{$movie->poster}}" alt="">
            <p class="col-6">Sinopsis:<br/> {{$movie->synopsis}} <br/><br/>
                Reseña:<br/> {{$movie->revie}}
            </p>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <div class="container mt-3">
        <div class="row">
            @guest
                <h4><a href="/login">Inicia sesion</a> o <a href="/register">Registrate</a> para comentar</h4>
            @else
                <form action="/comments/create" method="POST" class="col-12">
                    @csrf
                    <input type="text" name="comment" class="form-control 
                    @if ($errors->has('comment'))
                    is-invalid 
                    @endif" 
                    placeholder="Comenta que te parecio la pelicula">
                    <input type="hidden" name="movie_id" value="{{$movie->id}}">
                    <button type="submit" class="btn btn-primary">Comentar</button>
                    @if ($errors->has('comment'))
                        @foreach ($errors->get('comment') as $error)
                            <div class="invalid-feedback">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                </form>
            @endguest
        </div>
        <div class="row">
            <h3 class="col-12">Comentarios</h3>
            @forelse ($movie->commentsFor as $comment)
                <h5 class="font-weight-bold col-10">{{$comment->user->name}}</h5>
                <p class="text-muted text-right col-2">{{$comment->created_at}}</p>
                <p class="text-justify col-12">&nbsp;  {{$comment->comment}}</p>
                <br/>
                <br/> 
            @empty
                <h3>Ningun comentario en esta Pelicula</h3>
            @endforelse
        </div>    
    </div>   
@endsection
  