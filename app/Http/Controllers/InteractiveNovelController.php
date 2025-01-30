<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteractiveNovelController extends Controller
{
    public function index()
    {
        return view('games.interactive-novel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
        ]);

        Game::create([
            'type' => 'interactive novel', // Ensure the type is included here
            'player_id' => Auth::user()->id,
            'score' => $request->score,
        ]);

        return redirect()->route('interactive-novel.index')->with('success', 'Score saved successfully!');
    }
}