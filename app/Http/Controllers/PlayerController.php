<?php
namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Show a player's details.
     */
    public function index($id)
    {

        $player = Player::with('users')->findOrFail($id);
        return view('player.details', compact('player'));
    }

    public function create()
    {
        return view('player.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        $player = new Player();
        $player->user_id = Auth::id();
        $player->username = $validated['username'];
        $player->year_level = $validated['year_level'];
        $player->section = $validated['section'];
        $player->save();
        
        $score = new Score();
        $score->player_id = $player->id;
        $score->overall_score = 0;
        $score->hangman_score = 0;
        $score->text_twister_score = 0;
        $score->interactive_novel_score = 0;
        $score->save();

        $progress = new Progress();
        $progress->player_id = $player->id;
        $progress->hangman_easy_complete = false;
        $progress->hangman_medium_complete = false;
        $progress->hangman_hard_complete = false;
        $progress->hangman_easy_level = 0;
        $progress->hangman_medium_level = 0;
        $progress->hangman_hard_level = 0;
        $progress->text_twister_easy_complete = false;
        $progress->text_twister_medium_complete = false;
        $progress->text_twister_hard_complete = false;
        $progress->text_twister_easy_level = 0;
        $progress->text_twister_medium_level = 0;
        $progress->text_twister_hard_level = 0;
        $progress->interactive_novel_easy_complete = false;
        $progress->interactive_novel_medium_complete = false;
        $progress->interactive_novel_hard_complete = false;
        $progress->interactive_novel_easy_level = 0;
        $progress->interactive_novel_medium_level = 0;
        $progress->interactive_novel_hard_level = 0;
        $progress->save();

        // $hangmanLevelCompleted = $progress->hangman_easy_level + $progress->hangman_medium_level + $progress->hangman_hard_level;
        // $textTwisterLevelCompleted = $progress->text_twister_easy_level + $progress->text_twister_medium_level + $progress->text_twister_hard_level;
        // $interactiveNovelCompleted = $progress->interactive_novel_easy_level + $progress->interactive_novel_medium_level + $progress->interacive_novel_hard_level;
        // $overallLevelCompleted = $hangmanLevelCompleted + $textTwisterLevelCompleted + $interactiveNovelCompleted;


        return redirect()->route('dashboard')->with('success', 'Player profile created successfully.');
    }

    public function edit($id)
    {
        $player = Player::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('player.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        $player = Player::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $player->update($request->only('username', 'year_level', 'section'));
        return redirect()->route('dashboard')->with('success', 'Player profile updated successfully.');
    }

}
