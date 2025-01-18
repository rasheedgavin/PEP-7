<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Categories</title>
    <style>
        .categories {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .category {
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
        }
        .category.locked {
            background: #f0f0f0;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Choose a Category</h1>
    <button onclick="window.location.href='{{ route('dashboard') }}'">home</button>
    <div class="categories">
        <div class="category easy" onclick="{{ "handleCategory('easy')"}}">
            Easy
        </div>
        <div class="category medium" onclick="{{ "handleCategory('medium')"}}">
            Medium
        </div>
        <div class="category hard" onclick="{{ "handleCategory('hard')" }}">
            Hard
        </div>
    </div>    
    <script>
        function handleCategory(category) {
            // window.location.href = `/hangman/${category}`;
            window.location.href = `interactive-novel/${category}`;
        }
    </script>
</body>
</html>
