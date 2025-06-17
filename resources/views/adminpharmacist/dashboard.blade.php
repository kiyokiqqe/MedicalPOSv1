@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Адмінфармацевт - Головний дашборд') }}
    </h2>
@endsection

@section('content')
    <div class="flex gap-8">
        <!-- Меню -->
        <aside class="w-64 bg-white p-4 rounded-lg shadow space-y-4">
            <h3 class="text-lg font-bold text-gray-700">{{ __("Меню адмінфармацевта") }}</h3>
            <nav class="flex flex-col space-y-2">
                <a href="{{ route('adminpharmacist.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('adminpharmacist.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Головна') }}
                </a>
                <a href="{{ route('adminpharmacist.medications.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-200
                   {{ request()->routeIs('adminpharmacist.medications.*') ? 'bg-gray-300 font-semibold' : '' }}">
                    {{ __('Лікарські засоби') }}
                </a>
            </nav>
        </aside>

        <!-- Контент -->
        <div class="flex-1 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold">{{ __("Вітаємо на дашборді адмінфармацевта") }}</h3>
            <p>{{ __("Тут ви можете керувати обліком лікарських засобів та переглядати запити.") }}</p>
        </div>
    </div>
@endsection
