@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Адміністратор - Головний дашборд') }}
    </h2>
@endsection

@section('content')
    <div class="flex gap-8">
        <!-- Меню адміністратора -->
        <aside class="w-64 bg-white p-4 rounded-lg shadow space-y-4">
            <h3 class="text-lg font-bold text-gray-700">{{ __("Меню адміністратора") }}</h3>
            <nav class="flex flex-col space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Головна') }}
                </a>

                <a href="{{ route('admin.patients.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('admin.patients.*') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Пацієнти') }}
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('admin.users.*') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Користувачі') }}
                </a>
            </nav>
        </aside>

        <!-- Основний контент -->
        <div class="flex-1 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold">{{ __("Вітаємо на дашборді адміністратора") }}</h3>
            <p>{{ __("Тут ви можете керувати користувачами, пацієнтами та іншими налаштуваннями.") }}</p>
        </div>
    </div>
@endsection
