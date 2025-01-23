<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class AchievementsController extends Controller
{
    public function view($id)
    {
        $player = Player::with('users')->findOrFail($id);

        $hangmanLevel = $player->progress->hangman_easy_level + $player->progress->hangman_medium_level + $player->progress->hangman_hard_level;
        $textTwisterLevel = $player->progress->text_twister_easy_level + $player->progress->text_twister_medium_level + $player->progress->text_twister_hard_level;
        $interactiveNovelLevel = $player->progress->interactive_novel_easy_level + $player->progress->interactive_novel_medium_level + $player->progress->interactive_novel_hard_level;

        $overallLevel = $hangmanLevel + $textTwisterLevel + $interactiveNovelLevel;

        $hangmanCategory = $player->progress->hangman_easy_complete + $player->progress->hangman_medium_complete + $player->hangman_hard_complete;
        $textTwisterCategory = $player->progress->text_twister_easy_complete + $player->progress->text_twister_medium_complete + $player->text_twister_hard_complete;
        $interactiveNovelCategory = $player->progress->interactive_novel_easy_complete + $player->progress->interactive_novel_medium_complete + $player->interactive_novel_hard_complete;

        $overallCategory = $hangmanCategory + $textTwisterCategory + $interactiveNovelCategory;

        return view('achievements', compact('player', 'hangmanLevel', 'textTwisterLevel', 'interactiveNovelLevel' ,  'overallLevel', 'hangmanCategory', 'textTwisterCategory', 'interactiveNovelCategory', 'overallCategory'));
    }

}
