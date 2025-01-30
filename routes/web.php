<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AchievementsController;
=======
use App\Http\Controllers\HangmanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InteractiveNovelController;
use App\Http\Controllers\TextTwisterController;
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9
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

<<<<<<< HEAD

require __DIR__.'/auth.php';
=======
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/hangman', [HangmanController::class, 'index'])->name('hangman.index');
    Route::post('/hangman', [HangmanController::class, 'store'])->name('hangman.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/text-twister', [TextTwisterController::class, 'index'])->name('text-twister.index');
    Route::post('/text-twister', [TextTwisterController::class, 'store'])->name('text-twister.store');

    Route::get('/interactive-novel', [InteractiveNovelController::class, 'index'])->name('interactive-novel.index');
    Route::post('/interactive-novel', [InteractiveNovelController::class, 'store'])->name('interactive-novel.store');
});

Route::get('/games/hangman', function () {
    return view('games.hangman');
})->name('games.hangman');

Route::get('/games/interactive-novel', function () {
    return view('games.interactive-novel');
})->name('games.interactive-novel');

Route::get('/games/text-twister', function () {
    return view('games.text-twister');
})->name('games.text-twister');


require __DIR__.'/auth.php';
>>>>>>> 82c018e83413932ec66510d6203e88a7ad27fbb9
