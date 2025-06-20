<?php

use App\Http\Controllers\api\GameController;
use App\Http\Controllers\api\PlayerController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('games', GameController::class);
Route::post('games/{game}/players', [GameController::class, 'addPlayer'])->name('games.addPlayer');
Route::delete('games/{game}/players/{player}', [GameController::class, 'removePlayer'])->name('games.removePlayer');


Route::apiResource('players', PlayerController::class);