<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function viewOverallScore($id)
    {
        $activePlayer = Player::with('users')->findOrFail($id);
        $id = $activePlayer->id;
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

        return view('leaderboards.overall', compact('players', 'activePlayer', 'id'));
    }
    
    public function viewHangmanScore($id)
    {
        $activePlayer = Player::with('users')->findOrFail($id);
        $id = $activePlayer->id;
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

        return view('leaderboards.hangman', compact('players', 'activePlayer', 'id'));
    }

    public function viewTextTwisterScore($id)
    {
        $activePlayer = Player::with('users')->findOrFail($id);
        $id = $activePlayer->id;
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

        return view('leaderboards.text-twister', compact('players', 'activePlayer', 'id'));
    }

    public function viewInteractiveNovelScore($id)
    {
        $activePlayer = Player::with('users')->findOrFail($id);
        $id = $activePlayer->id;
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

        return view('leaderboards.interactive-novel', compact('players', 'activePlayer', 'id'));
    }
}
