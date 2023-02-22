@extends('layouts.main')

@section('container')
    <h1 class="mb-4 text-center">{{ $title }}</h1>
    
    @if ($games->count())
        <div class="card mb-3">
            @if ($games[0]->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $games[0]->image) }}" alt="games" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?games" class="card-img-top" alt="games">
            @endif
            
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/games/{{ $games[0]->slug }}" class="text-decoration-none text-dark">{{ $games[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        Dev. {{ $games[0]->developer }}
                    </small>
                </p>
                <p class="card-text">{{ $games[0]->excerpt }}</p>
                <a href="/games/{{ $games[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>


    <div class="container">
        <div class="row">
            @foreach ($games->skip(1) as $game)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark p-3 py-2 text-white" style="background-color: rgba(0,0,0,.5)"><a href="/games?category={{ $game->developer }}" class="text-decoration-none text-white">{{ $game->developer }}</a></div>
                        @if ($game->image)
                            <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->slug }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/500x400/?games">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/games/{{ $game->slug }}" class="text-decoration-none">{{ $game->title }}</a>
                            </h5>
                            <p>
                                <small class="text-muted">
                                    Dev. {{ $game->developer }}
                                </small>
                            </p>
                            <p class="card-text">
                                {{ $game->excerpt }}
                            </p>
                            <a href="/games/{{ $game->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $games->links() }}
    </div>
@endsection