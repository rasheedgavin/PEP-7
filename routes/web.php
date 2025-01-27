<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AchievementsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/leaderboards/{id}', [LeaderboardController::class, 'viewOverallScore'])->name('leaderboards.overall');
    Route::get('/leaderboards/hangman/{id}', [LeaderboardController::class, 'viewHangmanScore'])->name('leaderboards.hangman');
    Route::get('/leaderboards/text-twister/{id}', [LeaderboardController::class, 'viewTextTwisterScore'])->name('leaderboards.text-twister');
    Route::get('/leaderboards/interactive-novel/{id}', [LeaderboardController::class, 'viewInteractiveNovelScore'])->name('leaderboards.interactive-novel');
    Route::get('/players/{id}/details', [PlayerController::class, 'index'])->name('player.details');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/players', [PlayerController::class, 'store'])->name('player.store');
    Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
    Route::patch('/players/{id}', [PlayerController::class, 'update'])->name('player.update');
    Route::get('/hangman', [GameController::class, 'hangmanCategories'])->name('hangman.categories');
    Route::get('/hangman/{category}', [GameController::class, 'hangmanLevels'])->name('hangman.levels');
    Route::get('/hangman/{category}/{level}', [GameController::class, 'playHangmanLevel'])->name('hangman.play');
    Route::get('/text-twister', [GameController::class, 'textTwisterCategories'])->name('text-twister.categories');
    Route::get('/text-twister/{category}', [GameController::class, 'textTwisterLevels'])->name('text-twister.levels');
    Route::get('/text-twister/{category}/{level}', [GameController::class, 'playTextTwisterLevel'])->name('text-twister.play');
    Route::get('/interactive-novel', [GameController::class, 'interactiveNovelCategories'])->name('interactive-novel.categories');
    Route::get('/interactive-novel/{category}', [GameController::class, 'interactiveNovelLevels'])->name('interactive-novel.levels');
    Route::get('/interactive-novel/{category}/{level}', [GameController::class, 'playInteractiveNovelLevel'])->name('interactive-novel.play');
    Route::post('/increment/hangman/score', [ScoreController::class, 'incrementHangmanScore']);
    Route::post('/increment/text-twister/score', [ScoreController::class, 'incrementTextTwisterScore']);
    Route::post('/increment/interactive-novel/score', [ScoreController::class, 'incrementInteractiveNovelScore']);
    Route::get('/achievements/view/{id}', [AchievementsController::class, 'view'])->name('achievements.view');
    Route::get('/novel/view', [DashboardController::class, 'viewNovel'])->name('novel.view');
});


require __DIR__.'/auth.php';
