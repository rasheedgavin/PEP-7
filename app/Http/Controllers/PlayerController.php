<?php
namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{

    public function index($id)
    {

        $player = Player::with('users')->findOrFail($id);
        $id = $player->id;
        return view('player.details', compact('player', 'id'));
    }

    public function create()
    {
        return view('player.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'username' => 'required|string|max:255',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);
    
        $player = new Player();
    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_pictures', $filename);
    
            $player->profile_picture = $filename; 
        }
        
        // $validated['profile_picture'] = $request->file('profile_picture')->store('profile_picture');
        $player->user_id = Auth::id();
        $player->username = $validated['username'];
        $player->year_level = $validated['year_level'];
        $player->section = $validated['section'];
        $player->save();
    
        $score = new Score();
        $score->player_id = $player->id;
        $score->overall_score = 0;
        $score->hangman_score = 0;
        $score->text_twister_score = 0;
        $score->interactive_novel_score = 0;
        $score->save();
    
        $progress = new Progress();
        $progress->player_id = $player->id;
        $progress->hangman_easy_complete = false;
        $progress->hangman_medium_complete = false;
        $progress->hangman_hard_complete = false;
        $progress->hangman_easy_level = 0;
        $progress->hangman_medium_level = 0;
        $progress->hangman_hard_level = 0;
        $progress->text_twister_easy_complete = false;
        $progress->text_twister_medium_complete = false;
        $progress->text_twister_hard_complete = false;
        $progress->text_twister_easy_level = 0;
        $progress->text_twister_medium_level = 0;
        $progress->text_twister_hard_level = 0;
        $progress->interactive_novel_easy_complete = false;
        $progress->interactive_novel_medium_complete = false;
        $progress->interactive_novel_hard_complete = false;
        $progress->interactive_novel_easy_level = 0;
        $progress->interactive_novel_medium_level = 0;
        $progress->interactive_novel_hard_level = 0;
        $progress->save();
    
        return redirect()->route('dashboard')->with('success', 'Player profile created successfully.');
    }

    public function edit($id)
    {
        $player = Player::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('player.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|max:255',
            'year_level' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);
    
        $player = Player::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    
        if ($request->hasFile('profile_picture')) {
            if ($player->profile_picture) {
                Storage::delete('public/profile_pictures/' . $player->profile_picture);
            }
    
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_pictures', $filename);
    
            $player->profile_picture = $filename;
        }
    
        $player->username = $request->username;
        $player->year_level = $request->year_level;
        $player->section = $request->section;
        
        $player->save();
    
        return redirect()->route('dashboard')->with('success', 'Player profile updated successfully.');
    }
    
    
}
    