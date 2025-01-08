<?php
namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function incrementScore(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:scores,player_id',
            'hangman_score' => 'required|integer',
            'overall_score' => 'required|integer',
        ]);

        $score = Score::where('player_id', $request->player_id)->first();

        if ($score) {
            $score->increment('hangman_score', $request->hangman_score);
            $score->increment('overall_score', $request->overall_score);
            $score->save();

            return response()->json([
                'hangman_score' => $score->hangman_score,
                'overall_score' => $score->overall_score,
            ]);
        }

        return response()->json(['error' => 'Score record not found'], 404);
    }

}
