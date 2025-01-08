<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Details</title>
</head>
<body>
    <h1>Player Details</h1>
    <p><strong>Username:</strong> {{ $player->username }}</p>
    <p><strong>Year Level:</strong> {{ $player->year_level }}</p>
    <p><strong>Section:</strong> {{ $player->section }}</p>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a><br>
    <a href="{{ route('players.edit',  ['id' => $player->id]) }}">edit</a>
</body>
</html>
