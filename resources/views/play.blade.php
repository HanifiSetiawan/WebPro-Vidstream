@extends('layouts.nav')

@section('content')
    <div class="container">
        <h1>{{ $movie->title }}</h1>
        @auth
            <form action="{{ route('movie.comment', $movie->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Add a comment</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Log in</a> to add a comment.</p>
        @endauth
        <div class="comments">
            <h3>Comments</h3>
            @foreach($comments->Reverse() as $comment)
                <div class="card mb-3" style="background-color: #333;">
                    <div class="card-header" style="color: white; font-size: 1.0em; padding: 0.4em;"> 
                        {{ $comment->user->name }}
                    </div>
                    <div class="card-body" style="padding: 0.5em;"> 
                        <p class="card-text" style="color: white; font-size: 0.9em;">{{ $comment->content }}</p>
                    </div>
                    <div class="card-footer text-muted text-end mt-2" style="color: white; font-size: 0.6em; padding: 0.3em;"> 
                        {{ $comment->created_at->format('Y-m-d H:i') }}
                    </div>
                </div>
            @endforeach
        </div>       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
