<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;


class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        Movie::create([
            'title' => 'Parasyte',
            'genre' => 'Horror',
            'year' => 2024,
            'description' => 'A group of mysterious parasitic creatures fall from outer space and begin using humans as hosts, killing them, and completely transforming them into unique creatures that can shapeshift their heads into anything.',
            'poster' => '..img/moviepost/parasyte.jpg',
            'video_path' => '..video/parasyte.mp4',
        ]);
    }
}
