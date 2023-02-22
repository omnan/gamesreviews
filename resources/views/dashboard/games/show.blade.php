@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-8">
                <article>
                    <h1 class="mb-3">{{ $game->title }}</h1 class="mb-3">
                    <a href="/dashboard/games" class="btn btn-success"><span data-feather="arrow-left"></span> Back to games</a>
                    <a href="/dashboard/games/{{ $game->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit game</a>
                    <form action="/dashboard/games/{{ $game->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Delete it?')"><span data-feather="x-circle"></span> Delete game</button>
                    </form>
                    @if ($game->image)
                        <div style="max-height: 250px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->slug }}" class="img-fluid mt-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?games" alt="games" class="img-fluid mt-3 md-3">
                    @endif
                    <br>
                    <p class="ms-3">Developer : {{ $game->developer }}</p>
                    <article class="my-3 fs-4">
                        {!! $game->body !!}
                    </article>
                    
                </article>
            </div>
        </div>
    </div>
@endsection