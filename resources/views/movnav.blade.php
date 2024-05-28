<!-- resources/views/search-results.blade.php -->
@extends('layouts.nav')

@section('content')
    @if($trending)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Trending Movies</h1>
    @elseif($popular)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Popular Movies</h1>
    @elseif($liked)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Most Liked Movies</h1>
    @endif
    <div class="container-fluid">
        <div class="mx-5">
            @php
                $moviesCount = $movies->count();
            @endphp
            @if($moviesCount > 0)
                @for ($i = 0; $i < ceil($moviesCount / 7); $i++)
                    <div class="row text-center text-white justify-content-center">
                        @php
                            $start = $i * 7;
                            $end = min(($i + 1) * 7, $moviesCount);
                        @endphp
                        @foreach($movies->slice($start, $end - $start) as $movie)
                            <div class="col mt-5 mb-3">
                                <a href="{{ route('movie.play', $movie->title) }}">
                                    <img src="{{ asset($movie->poster) }}" class="imgsize rounded darken-on-hover">
                                </a>
                                <div class="mt-2 fs-7 fw-light">
                                    <h5>{{ $movie->title }}</h5>
                                    <p>{{ $movie->genre }} ({{ $movie->year }})</p>
                                </div>
                            </div>
                        @endforeach
                        @if ($end - $start < 7)
                            @for ($j = 0; $j < 7 - ($end - $start); $j++)
                                <div class="col mt-5 mb-3"></div>
                            @endfor
                        @endif
                    </div>
                @endfor
            @else
                <div class="row text-center text-white justify-content-center">
                    <div class="col mt-5 mb-3">
                        <h5>No movies found.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

@endsection