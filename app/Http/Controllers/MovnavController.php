<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovnavController extends Controller
{
    public function trending() {
        $movies = Movie::where('trending', 1)
                       ->where('type', 'Movie')
                       ->get();
        $trending = true;
        $popular = false;
        $liked = false;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function popular(){
        $movies = Movie::where('popular', 1)
                       ->where('type', 'Movie')
                       ->get();
        $trending = false;
        $popular = true;
        $liked = false;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function liked(){
        $movies = Movie::where('likes', 1)
                       ->where('type', 'Movie')
                       ->get();
        $trending = false;
        $popular = false;
        $liked = true;
        return view('movnav', compact('movies', 'trending', 'popular', 'liked'));
    }
}