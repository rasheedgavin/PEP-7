<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $player = Player::where('user_id', Auth::id())->first();
        $id = $player->id ?? '0';
        return view('dashboard', compact('player', 'id'));
    }

    public function viewNovel()
    {
        return view('novel');
    }

    public function viewAchievements($id){

        $player= Player::with('users')->findOrFail($id);

        return  view('achievements', compact('player'));
    }
}

