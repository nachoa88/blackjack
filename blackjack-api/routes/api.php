<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RankingController;

// Public routes:
Route::post('/players', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/players/ranking', [RankingController::class, 'ranking']);
Route::get('/players/ranking/loser', [RankingController::class, 'worstPlayer']);
Route::get('/players/ranking/winner', [RankingController::class, 'bestPlayer']);

// Protected routes:
Route::middleware('auth:api')->group(function () {
    // Accesed by player:
    Route::put('/players/{user}', [UserController::class, 'update']);

    Route::prefix('players/{user}')->group(function () {
        Route::get('games', [GameController::class, 'show']);
        Route::post('games', [GameController::class, 'store']);
        Route::delete('games', [GameController::class, 'destroyAll']);
    });

    // Accesed by admin and moderator:
    Route::get('/players', [UserController::class, 'getAll']);
    Route::delete('/players/{user}', [UserController::class, 'destroy']);
});

// ENDPOINTS PER MILLORAR JOC:
// Route::post('/players/{id}/games/{game_id}/hit', [GameController::class, 'hit']);
// // Maybe not necessary
// Route::post('/players/{id}/games/{game_id}/stand', [GameController::class, 'stand']);
// // Dealer's turn (if he shows only one card, at the end of turn shows the other one and gets more cards if his score is less than 17)
// Route::post('/players/{id}/games/{game_id}/dealer', [GameController::class, 'dealerTurn']);