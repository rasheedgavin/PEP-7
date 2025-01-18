<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Details</title>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <div class="player-info">
            <p><strong>Username:</strong> {{ $player->username }}</p>
            <p><strong>Year Level:</strong> {{ $player->year_level }}</p>
            <p><strong>Section:</strong> {{ $player->section }}</p>
            <p><strong>Overall Score:</strong> {{ $player->scores->overall_score }}</p>
            <p><strong>Hangman Score:</strong> {{ $player->scores->hangman_score }}</p>
            <p><strong>Text Twister Score:</strong> {{ $player->scores->text_twister_score }}</p>
            <p><strong>Text Twister Score:</strong> {{ $player->scores->interactive_novel_score }}</p>
        </div>
        <div class="button-container">
            <button class="action-button back-button" onclick="window.location='{{ route('dashboard') }}'">Back</button>
            <button class="action-button edit-button" onclick="window.location='{{ route('players.edit', ['id' => $player->id]) }}'">Edit</button>
            <button class="action-button account-button" onclick="window.location='{{ route('profile.edit') }}'">Account</button>
        </div>
    </div>
</body>
</html>
