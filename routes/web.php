<?php

use App\Models\Game;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardGameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => "home",
        "games" => Game::latest()->get()
    ]);
});

// Route::get('/games', function () {
//     return view('games',[
//         "title" => "Games",
//         "active" => "games"
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about"
    ]);
});

Route::get('/genres', function () {
    return view('genres', [
        "title" => "Genres",
        "active" => "genres"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// all games
Route::get('/games', [GameController::class, 'index']);

// single post
Route::get('/games/{game:slug}', [GameController::class, 'show']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/games', DashboardGameController::class)->middleware('auth');