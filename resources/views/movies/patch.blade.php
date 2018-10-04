@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                
            <form class="col-10 m-auto" method="PATCH" enctype="multipart/form-data" id="form_movie_patch">
                @csrf
                <div id="inputs">
                        <script>window.onload = patchForm();</script>
                </div>
            </form>
        </div>
    </div>
@endsection