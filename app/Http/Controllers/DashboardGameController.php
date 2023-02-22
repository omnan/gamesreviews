<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.games.index', [
            'games' => Game::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:games',
            'developer' => 'nullable',
            'image' => 'image|file|max:10240',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('games-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Game::create($validatedData);

        return redirect('/dashboard/games')->with('success', 'New game added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('dashboard.games.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('dashboard.games.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if($game->image) {
                Storage::delete($game->image);
        }

        Game::destroy($game->id);
        return redirect('/dashboard/games')->with('success', 'Game has been deleted!');
    }
}
