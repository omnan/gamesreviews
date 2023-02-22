@extends('layouts.main')

@section('container')
    <h1 class="mb-4 text-center">{{ $title }}</h1>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Sebuah website yang dibuat untuk kepentingan pribadi</h1>
            <p class="lead my-3">Selain karena tugas kuliah, design web ini merupakan sarana latihan dan dalam rangka menambah pengalaman dalam hal web design.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Recent</strong>
              <h3 class="mb-0">{{ $games[0]->title }}</h3>
              <div class="mb-1 text-muted">{{ $games[0]->developer }}</div>
              <p class="card-text mb-auto fs-6">{{ $games[0]->excerpt }}</p>
              <a href="/games/{{ $games[0]->slug }}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                @if ($games[0]->image)
                    <img class="bd-placeholder-img" width="200" height="250" src="{{ asset('storage/' . $games[0]->image) }}" alt="{{ $games[0]->slug }}" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/200x250/?games">
                @endif
    
            </div>
          </div>
        </div>

        <div class="col-md-6">
            
            @php
                $random = mt_rand(1, count($games))
            @endphp

          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Random</strong>
              <h3 class="mb-0">{{ $games[$random]->title }}</h3>
              <div class="mb-1 text-muted">{{ $games[$random]->developer }}</div>
              <p class="mb-auto fs-6">{{ $games[$random]->excerpt }}</p>
              <a href="/games/{{ $games[$random]->slug }}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                @if ($games[$random]->image)
                    <img class="bd-placeholder-img" width="200" height="250" src="{{ asset('storage/' . $games[$random]->image) }}" alt="{{ $games[$random]->slug }}" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/200x250/?games">
                @endif
    
            </div>
          </div>
        </div>
      </div>
@endsection