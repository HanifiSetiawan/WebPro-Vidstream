<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class formController extends Controller
{
    public function storeAndRedirect(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'description' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
            'video_path' => 'required, mp4, mkv',
        ], [
            'title.required' => 'Title field is required',
            'genre.required' => 'Genre field is required',
            'year.required' => 'Year field is required',
            'description.required' => 'Description field is required',
            'poster.image' => 'The file must be an image.',
            'poster.mimes' => 'Only JPEG, PNG, JPG, and GIF files are allowed.',
            'poster.max' => 'The image must be less than 2MB in size.',
            'video_path' => 'video is required'
        ]);

        // Handle image upload and store the path
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('public/img/moviepost');
        } else {
            $posterPath = null;
        }
        
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('public/video');
        } else {
            $videoPath = null;
        }

        Movie::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'year' => $request->year,
            'description' => $request->description,
            'poster' => $posterPath,
            'video' => $videoPath, 
        ]);

        return redirect('/home')->with('success', 'Successfully added!');
    }
}
