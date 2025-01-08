<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/game/option', [GameController::class, 'option'])->name('game.option');
    Route::get('/game/{game}', [GameController::class, 'view'])->name('game.view');
    Route::get('/leaderboards', [LeaderboardController::class, 'view'])->name('leaderboard.view'); 
    Route::get('/players/{id}/details', [PlayerController::class, 'index'])->name('players.details');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::patch('/players/{id}', [PlayerController::class, 'update'])->name('players.update');
    Route::post('/update-score', [ScoreController::class, 'incrementScore']);
});

require __DIR__.'/auth.php';
