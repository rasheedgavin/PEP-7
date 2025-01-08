<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function view()
    {
        $players = Player::with('scores')->get();

        foreach ($players as $player) {
            if (!$player->scores) {
                $player->score = 0;
            } else {
                $player->score = $player->scores->overall_score;
            }
        }

        $players = $players->sortByDesc('score');

        $rank = 1; 
        foreach ($players as $player) {
            $player->rank = $rank++;
        }

        return view('leaderboard', compact('players'));
    }
}
