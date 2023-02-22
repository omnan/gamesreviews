@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <article>
                    <h1 class="mb-3">{{ $game->title }}</h1 class="mb-3">
                    <p>Dev. <a href="/games?author={{ $game->developer }}" class="text-decoration-none">{{ $game->developer }}</a></p>
                    @if ($game->image)
                        <div style="max-height: 250px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $game->image) }}" alt="games" class="img-fluid mt-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?games" alt="games" class="img-fluid mt-3">
                    @endif
                    <article class="my-3 fs-4">
                        {!! $game->body !!}
                    </article>
                    <hr>
                    <h3 class="mt-3 text-center">Users Experiences</h3>
                    <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Processor</th>
                            <th scope="col">RAM</th>
                            <th scope="col">Average FPS</th>
                            <th scope="col">Setting</th>
                            <th scope="col">Version</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($comments->count())
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>*****</td>
                                        <td>{{ $comment->Processor }}</td>
                                        <td>{{ $comment->ram }} GB</td>
                                        <td>{{ $comment->fps }} FPS</td>
                                        <td>{{ $comment->setting }}</td>
                                        <td>{{ $comment->version }}</td>
                                    </tr>   
                                @endforeach
                            @else
                                <div><h5 class="text-center fst-italic text-danger">Dalam Pengembangan</h5></div>
                            @endif
                        </tbody>
                      </table>
                </article>
                <hr>
                <a href="/games" class="text-decoration-none">Bact to Games</a>
            </div>
        </div>
    </div>
    
@endsection

