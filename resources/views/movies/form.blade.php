@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/movies/create" class="col-10 m-auto" method="POST" enctype="multipart/form-data" id="form_movie_post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Ingresa Titulo">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="synopsis" placeholder="Ingresa Sinopsis">
                </div>
                <div class="form-group">
                    <textarea name="review" class="form-control" rows="10" placeholder="Ingresa Reseña"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="poster">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary m-auto">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection