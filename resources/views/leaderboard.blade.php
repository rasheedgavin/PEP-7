<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players and Scores</title>
</head>
<body>
    <h1>Players and Their Rankings</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Overall Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->rank }}</td>
                    <td>{{ $player->username }}</td>
                    <td>{{ $player->score ?? 'No Score' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
