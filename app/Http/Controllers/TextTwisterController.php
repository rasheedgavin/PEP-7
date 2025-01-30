<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line

class TextTwisterController extends Controller
{
    public function index()
    {
        return view('games.text-twister');
    }

    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
        ]);

        Game::create([
            'type' => 'text twister',
            'player_id' => Auth::user()->id, // Use the Auth facade here
            'score' => $request->score,
        ]);

        return redirect()->route('text-twister.index')->with('success', 'Score saved successfully!');
    }
}