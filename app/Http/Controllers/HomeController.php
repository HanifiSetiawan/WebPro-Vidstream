<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MovieController $movieController)
    {
        $movies = $movieController->index();

        // Sort movies by creation date in descending order
        $sortedMovies = $movies->sortByDesc('created_at');
        $movietype = $movies->where('type', 'Movie');
        $tv = $movies->where('type', 'TV-Series');

        // Pass sorted movies to the view
        return view('home', compact('sortedMovies', 'movietype', 'tv'));
    }
}
