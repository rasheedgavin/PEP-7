<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello {{$player->username}} </h1>
    <h2>Achievements</h2>
    @if ($player->progress->hangman_easy_complete)
        <p>you completed hangman easy levels</p>
    @else
        <p>Hangman Levels not complete</p>
    @endif
</body>
</html>