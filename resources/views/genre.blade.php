<!-- resources/views/search-results.blade.php -->
@extends('layouts.nav')

@section('content')
    @if($action)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Action List</h1>
    @elseif($adventure)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Adventure List</h1>
    @elseif($comedy)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Comedy List</h1>
    @elseif($romance)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Romance List</h1>
    @elseif($horror)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Horror List</h1>
    @elseif($mystery)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Mystery List</h1>
    @elseif($drama)
        <h1 class="ms-5 mt-5 mb-3 text-white fw-normal">Drama List</h1>
    @endif
    <div class="container-fluid">
        <div class="mx-5">
            @php
                $moviesCount = $movies->count();
            @endphp
            @if($moviesCount > 0)
                @for ($i = 0; $i < min(2, ceil($moviesCount / 7)); $i++)
                    <div class="row text-white row-cols-auto">
                        @php
                            $start = $i * 7;
                            $end = min(($i + 1) * 7, $moviesCount);
                        @endphp
                        @foreach($movies->slice($start, $end - $start) as $movie)
                            <div class="col-sm mt-2 d-flex flex-column justify-content-start">
                                <div class="container-sm">
                                    <a href="{{ route('movie.play', $movie->title) }}">
                                        <!-- Update the src attribute to use the correct path -->
                                        <img src="{{ asset($movie->poster) }}" class="imgsize rounded darken-on-hover">
                                    </a>
                                    <div class="d-flex align-items-start text-start">
                                        <div class="details-section align-self-end">
                                            <a href="{{ route('movie.play', $movie->title) }}" class="fs-6 mt-2 d-inline-block text-truncate link-light" style="max-width: 170px;">{{ $movie->title }}</a >
                                            <p class="fs-6 fst-italic mb-3 " style="color: #b3b1b1">{{ $movie->genre }} ({{ $movie->year }})</p>
                                        </div>
                                    </div>
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
                        <h5>No Series found.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

@endsection