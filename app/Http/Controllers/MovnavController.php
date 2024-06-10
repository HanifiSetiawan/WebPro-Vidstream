<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovnavController extends Controller
{
    public function trending() {
        $movies = Movie::where('trending', 1)
                       ->where('type', 'Movie')
                       ->paginate(14);
        $trending = true;
        $popular = false;
        $liked = false;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function popular(){
        $movies = Movie::where('popular', 1)
                       ->where('type', 'Movie')
                       ->paginate(14);
        $trending = false;
        $popular = true;
        $liked = false;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function liked(){
        $movies = Movie::where('type', 'Movie')
                        ->orderBy('likes', 'desc')
                        ->paginate(14);
        $trending = false;
        $popular = false;
        $liked = true;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }
}
