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

    public function play(Movie $movie)
    {
        return view('play', compact('movie'));
    }
}