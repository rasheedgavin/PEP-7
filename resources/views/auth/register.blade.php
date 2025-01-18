<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<style>
    /* Same styles as the login page */
    body {
        background-image: url('https://i.pinimg.com/originals/4a/a7/10/4aa710cff03fe03926f140540f40e852.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-attachment: fixed; 
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        position: relative;
        background-color: none;
        border: 2px solid white;
        border-radius: 8px;
        padding: 2rem 3rem 2rem 2rem;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }

    /* Form Elements */
    .block {
        margin-top: 1rem;
    }

    .w-full {
        width: 100%;
    }

    .text-gray-600 {
        color: white;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .input-label {
        font-size: 1rem;
        font-weight: bold;
        color: white;
    }

    .text-input {
        border: 1px solid white;
        padding: 0.75rem;
        border-radius: 4px;
        width: 100%;
        font-size: 1rem;
        margin-top: 0.25rem;
        margin-right: 20px;
        transition: all 0.3s ease;
        background-color: transparent;
        color: lightcyan;
    }

    .text-input:focus {
        border-color: #ddc228;
        box-shadow: 0 0 5px rgba(141, 119, 23, 0.5);
        outline: none;
    }

    .input-error {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    /* Button Styling */
    .primary-button {
        background-color: #d6c268;
        color: black;
        font-weight: bolder;
        padding: 0.75rem 2rem;
        border-radius: 4px;
        font-size: 1rem;
        border: none;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .primary-button:hover {
        background-color: #b8ad14;
    }

    
    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me input {
        margin-right: 0.5rem;
    }

    .remember-me span {
        color: white;
        font-size: 0.875rem;
    }

    .forgot-password {
        color: #ecae67;
        font-size: 0.875rem;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .forgot-password:hover {
        color: #c98a03;
    }

    .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); 
        z-index: 1;
    }
</style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</body>
</html>