<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Comment;
use App\Http\Requests\CreateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        
        $movie = Movie::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'synopsis' => $request->input('synopsis'),
            'review' => $request->input('review'),
            'poster' => $request->input('poster')
        ]);

        return response()->json($movie, 200);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        
        return response()->json($movie, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        if (empty($movie)){
            $response = [
                'error' => 'Not Found.'
            ];
            return response()->json($response, 404);
        }

        if ($request->has('title')) {
            $movie->title = $request->input('title');
        }
        if ($request->has('synopsis')) {
            $movie->synopsis = $request->input('synopsis');
        }
        if ($request->has('review')) {
            $movie->review = $request->input('review');
        }
        if ($request->has('poster')) {
            $movie->poster = $request->input('poster');
        }
        if ($request->has('date')) {
            $movie->date = $request->input('date');
        }

        if (!$movie->update()) {
            return response()->json(['msg' => 'Error during updating'], 404);
        }

        $response = [
            'msg' => 'Movie update',
            'status' => true,
            'service' => $movie
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (empty($movie)){
            $response = [
                'error' => 'Not Found.'
            ];
            return response()->json($response, 404);
        }
        $comments = Comment::where('movie_id', '=',$movie->id);
        $comments->delete();
        
        if (!$movie->delete()) {
            return response()->json(['msg' => 'deletion failed'], 404);
        }

        $response = [
            'msg' => "Successfully removed"
        ];

        return response()->json($response, 200);
    }
}
