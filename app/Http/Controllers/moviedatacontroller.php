<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class moviedatacontroller extends Controller
{
    public function index(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(7);

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function destroy($id)
    {
        if (session('isAdmin')) {
            $movie = movie::findOrFail($id);
            $movie->delete();
            return redirect()->back()->with('success', 'movie deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function more(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get(); 

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function less(Request $request)
    {
        if (session('isAdmin')) {

            $query = $request->input('search');
            $movies = Movie::when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(); 

            return view('movdata', ['movies' => $movies, 'search' => $query]);
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
