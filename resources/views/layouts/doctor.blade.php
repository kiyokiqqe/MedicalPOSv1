<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }} - Doctor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <div class="flex">
            <!-- Бічне меню лікаря -->
            <aside class="w-64 bg-white p-4 shadow space-y-4">
                <h3 class="text-lg font-bold text-gray-700">{{ __("Меню лікаря") }}</h3>
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('doctor.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('doctor.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                        {{ __('Головна') }}
                    </a>
                    <a href="{{ route('doctor.patients.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('doctor.patients.*') ? 'bg-gray-300 font-semibold' : '' }}">
                        {{ __('Пацієнти') }}
                    </a>
                </nav>
            </aside>

            <!-- Контент -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
