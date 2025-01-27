<?php
namespace App\Http\Controllers;


use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function hangmanCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $progress = $player->progress;
        return view('game.hangman.categories', compact('player', 'progress'));
    }

    public function hangmanLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;
        return view('game.hangman.levels', compact('player', 'progress', 'category'));
    }

    public function playHangmanLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }
        
        $progress = $player->progress;
        $unlockedLevelKey = "hangman_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('hangman.levels', $category)->with('error', 'Complete previous levels first.');
        }

        return view('game.hangman.play', compact('player', 'category', 'level', 'progress'));
    }



    public function textTwisterCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->confirm('error', 'Please create a profile first.');
        }

        $progress = $player->progress; 

        return view('game.text-twister.categories', compact('player', 'progress'));
    }


    public function textTwisterLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;

        return view('game.text-twister.levels', compact('player', 'progress', 'category'));
    }


    public function playTextTwisterLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $progress = $player->progress;
        $unlockedLevelKey = "text_twister_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        
        $validCategories = ['easy', 'medium', 'hard'];
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('text-twister.levels', $category)->with('error', 'Complete previous levels first.');
        }

        return view('game.text-twister.play', compact('player', 'category', 'level', 'progress'));
    }


    public function interactiveNovelCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $progress = $player->progress; 

        return view('game.interactive-novel.categories', compact('player', 'progress'));
    }


    public function interactiveNovelLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;

        return view('game.interactive-novel.levels', compact('player', 'progress', 'category'));
    }


    public function playInteractiveNovelLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }
    
        $validCategories = ['easy', 'medium', 'hard'];
    
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }
        
        $progress = $player->progress;
        $unlockedLevelKey = "interactive_novel_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('hangman.levels', $category)->with('error', 'Complete previous levels first.');
        }

        return view('game.interactive-novel.play', compact('player', 'category', 'level', 'progress'));
    }
    
}

