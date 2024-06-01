<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class TvnavController extends Controller
{
    public function trending() {
        $movies = Movie::where('trending', 1)
                       ->where('type', 'TV-Series')
                       ->get();
        $trending = true;
        $popular = false;
        $liked = false;
        return view('tvnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function popular(){
        $movies = Movie::where('popular', 1)
                       ->where('type', 'TV-Series')
                       ->get();
        $trending = false;
        $popular = true;
        $liked = false;
        return view('tvnav', compact('movies', 'trending', 'popular', 'liked'));
    }

    public function liked(){
        $movies = Movie::where('type', 'TV-Series')
                        ->orderBy('likes', 'desc')
                        ->get();
        $trending = false;
        $popular = false;
        $liked = true;
        return view('tvnav', compact('movies', 'trending', 'popular', 'liked'));
    }
}
