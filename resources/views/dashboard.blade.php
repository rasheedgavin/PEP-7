<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Game Projects</h3>

                    <ul class="mt-4 list-disc list-inside">
                        <li class="mt-2">
                            <a href="{{ route('games.hangman') }}" class="text-blue-500 hover:underline">Hangman</a>
                        </li>
                        <li class="mt-2">
                            <a href="{{ route('games.interactive-novel') }}" class="text-blue-500 hover:underline">Interactive Novel</a>
                        </li>
                        <li class="mt-2">
                            <a href="{{ route('games.text-twister') }}" class="text-blue-500 hover:underline">Text Twister</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
