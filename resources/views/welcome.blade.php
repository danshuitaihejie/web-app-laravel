<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/app.css" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="antialiased bg-gray-100">
<header>
    <div class="relative bg-white top-0 w-full lg:h-28 md:h-14 sm:h-14">
        <div class="container justify-center max-w-screen-lg m-auto">
            <div class="flex-col ">
                <div class="container justify-between flex items-center">
                    <div class="flex pt-2 pl-5 flex-nowrap items-center">
                        <img src="/image/Logo.png" width="60" height="60"/>
                        <x-welcome-link-button class="pl-3 font-bold text-2xl">{{ config('app.name', 'Laravel')}}
                        </x-welcome-link-button>
                    </div>
                    <x-jet-input class="w-1/3" type="text" placeholder="Search"></x-jet-input>
                    @if (Route::has('login'))
                    <div class="">
                        @auth
                        <x-welcome-link-button href="{{ url('/dashboard') }}">Dashboard</x-welcome-link-button>
                        @else
                        <x-welcome-link-button href="{{ route('login') }}" class="pr-4">Log in</x-welcome-link-button>

                        @if (Route::has('register'))
                        <x-welcome-link-button href="{{ route('register') }}">Register</x-welcome-link-button>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
                <div class="flex-row">

                </div>
            </div>
        </div>
    </div>
</header>
<div
    class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">


            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                            Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                            Sponsor
                        </a>
                    </div>
                </div>

            </div>
</body>
</html>
