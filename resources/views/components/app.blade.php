<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Movieroom') }}</title>
    <link rel="icon" href="/images/logo.jpg">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="px-8">
        <section class="py-4 mb-4">
            <header class="flex items-center justify-between mx-3 px-10 py-5 bg-red-400 rounded-lg shadow-lg">
                <h1>
                    <a href="/" class="flex items-center font-bold text-4xl text-white">
                        <img class="rounded-full border-red-800 border-lg mr-5"
                            src="/images/Logo.jpg"
                            alt="Movieroom"
                            width="60"
                            height="60"
                        >
                        MOVIEROOM
                    </a>
                </h1>
                <div>
                    @guest
                        <a href="{{ route('login') }}" class="object-right text-white text-xl font-bold m-2">Login</a>
                        <a href="{{ route('register') }}" class="object-right text-white text-xl font-bold m-2">Register</a>
                    @else
                        <div class="flex items-center object-right">
                            <a href="/users/{{auth()->user()->id}}" class="flex items-center object-right justify-between m-2">
                                <img class="rounded-full border-red-800 border-lg mr-5"
                                        src="/images/avatars/{{auth()->user()->avatar}}"
                                        width="40"
                                        height="40"
                                    >
                                <h1 class="text-white text-xl font-bold">
                                    {{auth()->user()->name}}
                                </h1>
                                </a>
                            <form method="post" action="/logout">
                                @csrf
                                <button class="object-right text-red-700 text-xl font-bold m-2">Logout</button>
                            </form>
                        </div>
                    @endguest
                </div>
            </header>
        </section>

        <section class="pb-4 mb-4">
            <div class="mx-3 px-12 py-10 bg-gray-600 rounded-lg shadow-lg">
                {{ $slot }}
            </div>
        </section>

        <section>
            <footer class="flex items-center justify-center mx-3 p-5 bg-gray-800 rounded-t-lg shadow-lg">
                <h1 class="text-white text-lg">
                    © All rights reserved. 
                </h1>
            </footer>
        </section>
    </div>
</body>
</html>
