<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $player = Player::where('user_id', Auth::id())->first();
        $id = $player->id;
        return view('dashboard', compact('id'));
    }
}

