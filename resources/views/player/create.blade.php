<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Player Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }
        .text-gold {
            color: #F4D03F;
        }
        .text-cream {
            color: #F8F1E8;
        }
        .btn-gradient {
            background: linear-gradient(to right, #F4D03F, #8B5E3C);
            box-shadow: 0 0 10px rgba(244, 208, 63, 0.6);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .btn-gradient:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(244, 208, 63, 0.9);
        }
        .input-field {
            background: linear-gradient(to bottom, #3b2f2f, #1e1e1e);
            border: 2px solid #F4D03F;
            color: #F8F1E8;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            width: 100%;
        }
        .input-field:focus {
            border-color: #8B5E3C;
            box-shadow: 0 0 10px rgba(244, 208, 63, 0.6);
        }
    </style>
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-center items-center">
    
    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center relative">
            <h1 class="text-gold text-4xl font-extrabold uppercase tracking-wide">Create Profile</h1>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="flex items-center px-4 py-2 space-x-2 transition rounded-full shadow-lg btn-gradient text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>

    <div class="w-full max-w-lg bg-header-gradient p-8 rounded-lg shadow-lg">
        
        <form action="{{ route('player.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="username" class="block text-gold mb-2">Username</label>
                <input type="text" name="username" id="username" required class="input-field">
            </div>

            <div>
                <label for="year_level" class="block text-gold mb-2">Year Level</label>
                <input type="number" name="year_level" id="year_level" value="7" readonly class="input-field">
            </div>

            <div>
                <label for="section" class="block text-gold mb-2">Section</label>
                <input type="text" name="section" id="section" required class="input-field">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="btn-gradient text-dark px-6 py-3 rounded-full">Create Profile</button>
            </div>
        </form>

        <footer class="py-6 bg-footer-gradient">
            <div class="container mx-auto text-center">
                <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
            </div>
        </footer>
    </div>

</body>
</html>
