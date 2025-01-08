<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Portal</title>
    <style>
        body, h2, a, button {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #333;
        }

        h2 {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        /* View Profile Button */
        .profile-btn {
            position: absolute;
            top: 0;
            left: 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-btn:hover {
            background-color: #218838;
        }

        /* Leaderboards Button */
        .leaderboards-btn {
            position: absolute;
            top: 0;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .leaderboards-btn:hover {
            background-color: #0056b3;
        }

        .games-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .game-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            gap: 15px;
        }

        .game-item img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #e2e8f0; /* Placeholder background */
        }

        .game-details {
            flex-grow: 1;
        }

        .game-item a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .game-item a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
    <?php
        $games = [
            'hangman' => 'Hangman',
            'text-twister' => 'Text Twister',
            'interactive-novel' => 'Interactive Novel',
        ];
    ?>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="header">
                <h1>PEP 7</h1>
                @if ($player)
                    <button class="profile-btn" onclick="window.location='{{ route('players.details', ['id' => $player->id]) }}'">
                        View Profile
                    </button>
                @else
                    <button class="profile-btn" onclick="window.location='{{ route('players.create')}}'">
                        Create Profile
                    </button>
                @endif
                <a href="{{ route('leaderboard.view') }}" class="leaderboards-btn">Leaderboards</a>
            </div>
        </x-slot>
    
        <div class="container">
            <div class="games-list">
                <?php foreach ($games as $key => $name): ?>
                    <div class="game-item">
                        <img src="" alt="<?php echo htmlspecialchars($name); ?> Image">
                        <div class="game-details">
                            <a href="<?php echo htmlspecialchars(route('game.view', ['game' => $key])); ?>">
                                <?php echo htmlspecialchars($name); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
