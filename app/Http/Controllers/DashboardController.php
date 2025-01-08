<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $player = Player::where('user_id', Auth::id())->first();
        return view('dashboard', compact('player'));
    }
}

