<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
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
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <!-- Header -->
    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-4xl font-extrabold uppercase tracking-wide">Profile Settings</h1>
            <p class="text-cream text-lg italic mt-2">Manage your profile, update your password, or delete your account</p>
        </div>
        <div class="absolute top-4 right-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-gradient text-dark px-6 py-2 rounded-full">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col space-y-8">
            <!-- Update Profile -->
            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Profile Information</h2>
                <p class="text-cream mb-6">Update your account's profile information and email address.</p>
                <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('patch')
                    <div>
                        <label for="name" class="block text-gold mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="input-field">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-gold mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="input-field">
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-gradient px-6 py-3 rounded-full">Save Changes</button>
                    </div>
                </form>
            </section>

            <!-- Update Password -->
            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Update Password</h2>
                <p class="text-cream mb-6">Ensure your account uses a long, random password for security.</p>
                <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('put')
                    <div>
                        <label for="current_password" class="block text-gold mb-2">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="input-field">
                        @error('current_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-gold mb-2">New Password</label>
                        <input type="password" id="password" name="password" class="input-field">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gold mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input-field">
                        @error('password_confirmation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-gradient px-6 py-3 rounded-full">Save Changes</button>
                    </div>
                </form>
            </section>

            <!-- Delete Account -->
            <section class="bg-header-gradient p-6 rounded-lg shadow-lg">
                <h2 class="text-gold text-2xl font-bold mb-4">Delete Account</h2>
                <p class="text-cream mb-6">Once deleted, all data will be permanently removed. Please confirm your password before deleting.</p>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div>
                        <label for="password" class="block text-gold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="input-field">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn-gradient bg-red-500 hover:bg-red-700 px-6 py-3 rounded-full">Delete Account</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and creativity.</p>
        </div>
    </footer>

</body>
</html>
