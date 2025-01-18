<?php
namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Player;
use Illuminate\Http\Request;


class ScoreController extends Controller
{
    public function incrementHangmanScore(Request $request)
    {
        $player = Player::find($request->player_id);

        if (!$player) {
            return response()->json(['success' => false, 'error' => 'Player not found.']);
        }

        $player->scores->hangman_score += $request->hangman_score;
        $player->scores->overall_score += $request->hangman_score;

        $player->scores->save();
        $progress = $player->progress;

        if ($progress) {
            $currentLevelKey = "hangman_{$request->category}_level";
            $completeKey = "hangman_{$request->category}_complete";

            if ($progress->{$currentLevelKey} < $request->level) {
                $progress->{$currentLevelKey} = $request->level;

                if ($request->level == 10) {
                    $progress->{$completeKey} = true;
                }

                $progress->save();
            }
        }

        return response()->json([
            'success' => true,
            'new_hangman_score' => $player->scores->hangman_score,
        ]);
    }

    public function incrementTextTwisterScore(Request $request)
    {
        $player = Player::find($request->player_id);

        if (!$player) {
            return response()->json(['success' => false, 'error' => 'Player not found.']);
        }

        $player->scores->text_twister_score += $request->text_twister_score;
        $player->scores->overall_score += $request->text_twister_score;

        $player->scores->save();
        $progress = $player->progress;

        if ($progress) {
            $currentLevelKey = "text_twister_{$request->category}_level";
            $completeKey = "text_twister_{$request->category}_complete";

            if ($progress->{$currentLevelKey} < $request->level) {
                $progress->{$currentLevelKey} = $request->level;

                if ($request->level == 10) {
                    $progress->{$completeKey} = true;
                }

                $progress->save();
            }
        }

        return response()->json([
            'success' => true,
            'new_text_twister_score' => $player->scores->text_twister_score,
        ]);
    }

    public function incrementInteractiveNovelScore(Request $request)
    {
        $player = Player::find($request->player_id);

        if (!$player) {
            return response()->json(['success' => false, 'error' => 'Player not found.']);
        }

        $player->scores->interactive_novel_score += $request->interactive_novel_score;
        $player->scores->overall_score += $request->interactive_novel_score;

        $player->scores->save();
        $progress = $player->progress;

        if ($progress) {
            $currentLevelKey = "interactive_novel_{$request->category}_level";
            $completeKey = "interactive_novel_{$request->category}_complete";

            if ($progress->{$currentLevelKey} < $request->level) {
                $progress->{$currentLevelKey} = $request->level;

                if ($request->level == 10) {
                    $progress->{$completeKey} = true;
                }

                $progress->save();
            }
        }

        return response()->json([
            'success' => true,
            'new_text_twister_score' => $player->scores->interactive_novel_score,
        ]);
    }

}

