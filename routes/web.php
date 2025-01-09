<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HangmanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InteractiveNovelController;
use App\Http\Controllers\TextTwisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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