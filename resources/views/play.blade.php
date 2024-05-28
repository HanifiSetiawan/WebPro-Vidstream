@extends('layouts.nav')

@section('content')
    <div class="container text-light mt-5">
        <div class="card bg-dark">
            <div class="card-body text-light">
                <div class="video-container">
                    <video width="100%" controls>
                        <source src="{{ asset($movie->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <h1>{{ $movie->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container text-light mt-5">
        @auth
            <form action="{{ route('movie.comment', $movie->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Add a comment</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-light">Submit</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Log in</a> to add a comment.</p>
        @endauth
        <div class="mt-2">
            <h3>Comments</h3>
            @foreach($comments as $comment)
                <div class="mb-3 p-3 rounded" style="background-color: #1c1c1c;">
                    <div class="d-flex align-items-center text-white">
                        <span>{{ $comment->user->name }}</span>
                        <span class="ms-auto small text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="mt-2 text-white">
                        <p class="mb-0">{{ $comment->content }}</p>
                    </div>
                    @if(session('isAdmin'))
                        <div class="text-end mt-2">
                            <form action="{{ route('comment.delete', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach

            @if (count($comments) > 0)
                @if (count($comments) >= 5)
                    @if(!$showAll)
                        <!-- Link to show all comments -->
                        <div class="text-center mt-3">
                            <a href="{{ route('movie.comments.all', ['title' => $movie->title]) }}" class="btn btn-outline-light">Show More Comments</a>
                        </div>
                    @else
                        <div class="text-center mt-3">
                            <a href="{{ route('movie.play', ['title' => $movie->title]) }}" class="btn btn-outline-light">Show Less</a>
                        </div>
                    @endif
                @endif
            @else
                <div class="text-center mt-3">
                    <p>No comments found</p>
                </div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
