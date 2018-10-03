<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Comment;
use App\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    public function create(CreateCommentRequest $request)
    {
        $user = $request->user();
        $comment = Comment::create([
            'comment' => $request->input('comment'),
            'movie_id' => $request->input('movie_id'),
            'user_id' => $user->id,
        ]);

        return redirect('/movies/'.$comment->movie_id);
    }
}
