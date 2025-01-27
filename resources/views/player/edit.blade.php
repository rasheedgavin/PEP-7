<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }
        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
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
        body {
            font-family: 'Cinzel', serif;
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
            color: #F8F1E8;
            text-align: center;
            min-height: 100vh;
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
        .profile-picture {
            border: 4px solid #F4D03F;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>

    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center relative">
            <h1 class="text-gold text-4xl font-extrabold uppercase tracking-wide">Player Profile & Settings</h1>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('player.details', compact('id')) }}'"
                class="flex items-center px-4 py-2 space-x-2 transition rounded-full shadow-lg btn-gradient text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 space-y-16">

        <section class="text-center">
            <div class="flex flex-col items-center">
                @if($player->profile_picture)
                    <img src="{{ asset('storage/public/profile_pictures/' . $player->profile_picture) }}" alt="Profile Picture" class="rounded-full w-36 h-36 profile-picture mb-4">
                @else
                    <img src="{{ asset('storage/public/photos/default-avatar.jpg') }}" alt="Default Avatar" class="rounded-full w-36 h-36 profile-picture mb-4">
                @endif
                <h2 class="text-3xl font-bold text-gold">{{ $player->users->username }}</h2>
                <p class="text-lg mt-2"><strong class="text-gold">Email:</strong> {{ $player->users->email }}</p>
                <p class="text-lg"><strong class="text-gold">Year Level:</strong> {{ $player->year_level }}</p>
                <p class="text-lg"><strong class="text-gold">Section:</strong> {{ $player->section }}</p>
            </div>
        </section>

        <section id="edit-profile" class="space-y-8">
            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Edit Profile</h2>
                <form action="{{ route('player.update', $player->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="profile_picture" class="block text-gold mb-2">Profile Picture</label>
                        <div class="flex items-center space-x-4">
                            @if($player->profile_picture)
                                <img src="{{ asset('storage/public/profile_pictures/' . $player->profile_picture) }}" alt="Current Profile" class="w-20 h-20 rounded-full">
                            @else
                                <img src="{{ asset('storage/public/photos/default-avatar.jpg') }}" alt="Default Avatar" class="w-20 h-20 rounded-full">
                            @endif
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="input-field">
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block text-gold mb-2">Username</label>
                        <input type="text" name="username" id="username" value="{{ $player->username }}" required class="input-field">
                    </div>
                    <div>
                        <label for="year_level" class="block text-gold mb-2">Year Level</label>
                        <input type="number" name="year_level" id="year_level" value="{{ $player->year_level }}" readonly class="input-field">
                    </div>
                    <div>
                        <label for="section" class="block text-gold mb-2">Section</label>
                        <input type="text" name="section" id="section" value="{{ $player->section }}" required class="input-field">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-gradient px-6 py-3 rounded-full">Update</button>
                    </div>
                </form>
            </section>

            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Update Password</h2>
                <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('put')
                    <div>
                        <label for="current_password" class="block text-gold mb-2">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="input-field">
                    </div>
                    <div>
                        <label for="password" class="block text-gold mb-2">New Password</label>
                        <input type="password" id="password" name="password" class="input-field">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gold mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input-field">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-gradient px-6 py-3 rounded-full">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Delete Account</h2>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div>
                        <label for="password" class="block text-gold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="input-field">
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn-gradient bg-red-500 hover:bg-red-700 px-6 py-3 rounded-full">Delete Account</button>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and creativity.</p>
        </div>
    </footer>
</body>
</html>
