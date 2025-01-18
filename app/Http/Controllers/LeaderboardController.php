<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function viewOverallScore()
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

        return view('leaderboards.overall', compact('players'));
    }
    
    public function viewHangmanScore()
    {
        $players = Player::with('scores')->get();

        foreach ($players as $player) {
            if (!$player->scores) {
                $player->score = 0;
            } else {
                $player->score = $player->scores->hangman_score;
            }
        }

        $players = $players->sortByDesc('score');

        $rank = 1; 
        foreach ($players as $player) {
            $player->rank = $rank++;
        }

        return view('leaderboards.hangman', compact('players'));
    }

    public function viewTextTwisterScore()
    {
        $players = Player::with('scores')->get();

        foreach ($players as $player) {
            if (!$player->scores) {
                $player->score = 0;
            } else {
                $player->score = $player->scores->text_twister_score;
            }
        }

        $players = $players->sortByDesc('score');

        $rank = 1; 
        foreach ($players as $player) {
            $player->rank = $rank++;
        }

        return view('leaderboards.text-twister', compact('players'));
    }

    public function viewInteractiveNovelScore()
    {
        $players = Player::with('scores')->get();

        foreach ($players as $player) {
            if (!$player->scores) {
                $player->score = 0;
            } else {
                $player->score = $player->scores->interactive_novel_score;
            }
        }

        $players = $players->sortByDesc('score');

        $rank = 1; 
        foreach ($players as $player) {
            $player->rank = $rank++;
        }

        return view('leaderboards.interactive-novel', compact('players'));
    }
}
