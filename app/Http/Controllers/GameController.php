<?php
namespace App\Http\Controllers;


use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function hangmanCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $progress = $player->progress;
        return view('game.hangman.categories', compact('player', 'progress'));
    }

    public function hangmanLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;
        return view('game.hangman.levels', compact('player', 'progress', 'category'));
    }

    public function playHangmanLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }

        $levels = [
            'easy' => [
                1 => ['word' => 'cat', 'description' => 'A small domesticated carnivorous mammal.'],
                2 => ['word' => 'dog', 'description' => 'A domesticated carnivorous mammal that barks.'],
                3 => ['word' => 'bat', 'description' => 'A flying mammal that uses echolocation.'],
                4 => ['word' => 'rat', 'description' => 'A medium-sized rodent.'],
                5 => ['word' => 'bee', 'description' => 'An insect known for producing honey.'],
                6 => ['word' => 'cow', 'description' => 'A large domesticated bovine animal.'],
                7 => ['word' => 'pig', 'description' => 'A domesticated swine often kept for meat.'],
                8 => ['word' => 'hen', 'description' => 'A female chicken.'],
                9 => ['word' => 'owl', 'description' => 'A nocturnal bird of prey with a flat face.'],
                10 => ['word' => 'fox', 'description' => 'A small, wild, omnivorous mammal.']
            ],
            'medium' => [
                1 => ['word' => 'apple', 'description' => 'A sweet, edible fruit from the apple tree.'],
                2 => ['word' => 'grape', 'description' => 'A small, sweet fruit used to make wine.'],
                3 => ['word' => 'peach', 'description' => 'A soft, juicy fruit with a fuzzy skin.'],
                4 => ['word' => 'mango', 'description' => 'A tropical fruit with sweet orange flesh.'],
                5 => ['word' => 'lemon', 'description' => 'A yellow citrus fruit known for its sour taste.'],
                6 => ['word' => 'melon', 'description' => 'A large fruit with a sweet, juicy flesh.'],
                7 => ['word' => 'cherry', 'description' => 'A small, round fruit with a pit, often red or black.'],
                8 => ['word' => 'banana', 'description' => 'A long, curved fruit with soft flesh inside.'],
                9 => ['word' => 'papaya', 'description' => 'A tropical fruit with orange flesh and black seeds.'],
                10 => ['word' => 'guava', 'description' => 'A tropical fruit with green skin and pink or white flesh.']
            ],
            'hard' => [
                1 => ['word' => 'elephant', 'description' => 'A large mammal with a trunk.'],
                2 => ['word' => 'dinosaur', 'description' => 'A diverse group of extinct reptiles.'],
                3 => ['word' => 'kangaroo', 'description' => 'A marsupial native to Australia.'],
                4 => ['word' => 'platypus', 'description' => 'A mammal that lays eggs and has a duck-like bill.'],
                5 => ['word' => 'rhinoceros', 'description' => 'A large herbivorous mammal with a horn on its nose.'],
                6 => ['word' => 'alligator', 'description' => 'A large reptile with a broad snout, found in the Americas.'],
                7 => ['word' => 'crocodile', 'description' => 'A large predatory reptile found in tropical regions.'],
                8 => ['word' => 'chameleon', 'description' => 'A reptile known for its ability to change color.'],
                9 => ['word' => 'hedgehog', 'description' => 'A small mammal with spines on its back.'],
                10 => ['word' => 'salamander', 'description' => 'An amphibian with a lizard-like appearance.']
            ]
        ];

        $levelData = $levels[$category][$level] ?? null;
        if (!$levelData) {
            abort(404, 'Invalid word for this level');
        }

        $progress = $player->progress;
        $unlockedLevelKey = "hangman_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('hangman.levels', $category)->with('error', 'Complete previous levels first.');
        }

        return view('game.hangman.play', compact('player', 'category', 'level', 'levelData', 'progress'));
    }



    public function textTwisterCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->confirm('error', 'Please create a profile first.');
        }

        $progress = $player->progress; 

        return view('game.text-twister.categories', compact('player', 'progress'));
    }


    public function textTwisterLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;

        return view('game.text-twister.levels', compact('player', 'progress', 'category'));
    }


    public function playTextTwisterLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $levels = [
            'easy' => [
                1 => ['letters' => 'cat', 'words' => ['cat', 'at', 'act', 'aso']],
                2 => ['letters' => 'dog', 'words' => ['dog', 'do', 'go']],
                3 => ['letters' => 'bat', 'words' => ['bat', 'at', 'tab']],
                4 => ['letters' => 'rat', 'words' => ['rat', 'at', 'art']],
                5 => ['letters' => 'bee', 'words' => ['bee', 'be']],
                6 => ['letters' => 'cow', 'words' => ['cow', 'ow', 'wo']],
                7 => ['letters' => 'pig', 'words' => ['pig', 'pi']],
                8 => ['letters' => 'hen', 'words' => ['hen', 'he']],
                9 => ['letters' => 'owl', 'words' => ['owl', 'wo', 'low']],
                10 => ['letters' => 'fox', 'words' => ['fox', 'of']],
            ],
            'medium' => [
                1 => ['letters' => 'apple', 'words' => ['apple', 'lap', 'pal']],
                2 => ['letters' => 'grape', 'words' => ['grape', 'gap', 'rage']],
                3 => ['letters' => 'peach', 'words' => ['peach', 'cap', 'ace']],
                4 => ['letters' => 'mango', 'words' => ['mango', 'man', 'go']],
                5 => ['letters' => 'lemon', 'words' => ['lemon', 'mole', 'no']],
                6 => ['letters' => 'melon', 'words' => ['melon', 'one', 'men']],
                7 => ['letters' => 'cherry', 'words' => ['cherry', 'cry', 'her']],
                8 => ['letters' => 'banana', 'words' => ['banana', 'ban', 'nan']],
                9 => ['letters' => 'papaya', 'words' => ['papaya', 'pay', 'pa']],
                10 => ['letters' => 'guava', 'words' => ['guava', 'vag', 'ava']],
            ],
            'hard' => [
                1 => ['letters' => 'elephant', 'words' => ['elephant', 'tent', 'pen']],
                2 => ['letters' => 'dinosaur', 'words' => ['dinosaur', 'rad', 'sand']],
                3 => ['letters' => 'kangaroo', 'words' => ['kangaroo', 'ran', 'oak']],
                4 => ['letters' => 'platypus', 'words' => ['platypus', 'play', 'tap']],
                5 => ['letters' => 'rhinoceros', 'words' => ['rhinoceros', 'rose', 'horn']],
                6 => ['letters' => 'alligator', 'words' => ['alligator', 'tail', 'go']],
                7 => ['letters' => 'crocodile', 'words' => ['crocodile', 'cold', 'ride']],
                8 => ['letters' => 'chameleon', 'words' => ['chameleon', 'man', 'calm']],
                9 => ['letters' => 'hedgehog', 'words' => ['hedgehog', 'hog', 'dog']],
                10 => ['letters' => 'salamander', 'words' => ['salamander', 'sand', 'land']],
            ],
        ];

        $progress = $player->progress;
        $unlockedLevelKey = "text_twister_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        
        $validCategories = ['easy', 'medium', 'hard'];
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('text-twister.levels', $category)->with('error', 'Complete previous levels first.');
        }

        $levelData = $levels[$category][$level] ?? null;

        if (!$levelData) {
            abort(404, 'Invalid level data');
        }

        return view('game.text-twister.play', compact('player', 'category', 'level', 'levelData', 'progress'));
    }


    public function interactiveNovelCategories()
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $progress = $player->progress; 

        return view('game.interactive-novel.categories', compact('player', 'progress'));
    }


    public function interactiveNovelLevels($category)
    {
        $player = Player::where('user_id', Auth::id())->first();

        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }

        $validCategories = ['easy', 'medium', 'hard'];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid category');
        }

        $progress = $player->progress;

        return view('game.interactive-novel.levels', compact('player', 'progress', 'category'));
    }


    public function playInteractiveNovelLevel($category, $level)
    {
        $player = Player::where('user_id', Auth::id())->first();
        if (!$player) {
            return redirect()->route('players.create')->with('error', 'Please create a profile first.');
        }
    
        $validCategories = ['easy', 'medium', 'hard'];
    
        if (!in_array($category, $validCategories) || $level < 1 || $level > 10) {
            abort(404, 'Invalid level or category');
        }
        
        $progress = $player->progress;
        $unlockedLevelKey = "interactive_novel_{$category}_level";
        $unlockedLevel = $progress->{$unlockedLevelKey} ?? 0;

        if ($level > $unlockedLevel + 1) {
            return redirect()->route('hangman.levels', $category)->with('error', 'Complete previous levels first.');
        }

        return view('game.interactive-novel.play', compact('player', 'category', 'level', 'progress'));
    }
    
}

