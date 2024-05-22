<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return $movies;
    }
    public function play($title)
    {
        $movie = Movie::where('title', $title)->firstOrFail();
        $comments = $movie->comments()->with('user')->get();

        return view('play', compact('movie', 'comments'));
    }

    public function storeComment(Request $request, $movieId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'movie_id' => $movieId,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'LIKE', "%{$query}%")
                       ->orWhere('genre', 'LIKE', "%{$query}%")
                       ->get();

        return view('search-result', compact('movies'));
    }
}
