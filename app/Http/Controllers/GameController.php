<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function view($game)
    {
        // Define available game views
        $views = [
            'hangman' => 'game.hangman',
            'text-twister' => 'game.text-twister',
            'interactive-novel' => 'game.interactive-novel',
        ];
    
        if (!array_key_exists($game, $views)) {
            abort(404);
        }
    
        // Fetch the player object for the authenticated user
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            abort(404, 'Player not found');
        }

        // Pass the player model to the view
        return view($views[$game], compact('player'));
    }
}

