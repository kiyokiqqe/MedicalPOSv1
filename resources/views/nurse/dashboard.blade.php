@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Медсестра - Головний дашборд') }}
    </h2>
@endsection

@section('content')
    <div class="flex gap-8">
        <!-- Меню медсестри -->
        <aside class="w-64 bg-white p-4 rounded-lg shadow space-y-4">
            <h3 class="text-lg font-bold text-gray-700">{{ __("Меню медсестри") }}</h3>

            <nav class="flex flex-col space-y-2">
                <a href="{{ route('nurse.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('nurse.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Головна') }}
                </a>

                <a href="{{ route('nurse.patients.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('nurse.patients.*') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Пацієнти') }}
                </a>
            </nav>
        </aside>

        <!-- Основний контент -->
        <div class="flex-1 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold">{{ __('Вітаємо, медсестра!') }}</h3>
            <p>{{ __('Це ваш головний дашборд. Тут ви можете переглядати пацієнтів і виконувати свої обов’язки.') }}</p>
        </div>
    </div>
@endsection
