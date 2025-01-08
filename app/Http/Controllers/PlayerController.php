<?php
namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
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
        // Validate the request data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        // Create a new player
        $player = new Player();
        $player->user_id = Auth::id(); // Assuming the player is related to an authenticated user
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

    // public function destroy($id)
    // {
    //     $player = Player::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    //     $player->delete();
    //     return redirect()->route('dashboard')->with('success', 'Player profile deleted successfully.');
    // }
}
