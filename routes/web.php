<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::resource('games', GameController::class);
Route::resource('players', PlayerController::class);

Route::post('/games/{game}/players', [GameController::class, 'addPlayer'])->name('games.players.store');
Route::delete('/games/{game}/players/{player}', [GameController::class, 'removePlayer'])->name('games.players.destroy');