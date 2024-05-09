<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return $movies;
    }

    public function play($title)
    {
        $title = str_replace('-', ' ', $title);
        
        // Fetch the movie based on the title
        $movie = Movie::where('title', $title)->firstOrFail();
        
        return view('play', compact('movie'));
    }
}