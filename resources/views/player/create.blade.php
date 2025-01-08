<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Create Player Profile</h1>
        <form action="{{ route('players.store') }}" method="POST">
            @csrf
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            
            <label for="year_level">Year Level:</label>
            <input type="number" name="year_level" id="year_level" required>
            
            <label for="section">Section:</label>
            <input type="text" name="section" id="section" required>
            
            <button type="submit">Create</button>
        </form>
</body>
</html>
