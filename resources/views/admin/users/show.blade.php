@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Перегляд користувача (Адміністратор)') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">ID:</label>
            <p class="text-gray-900">{{ $user->id }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Ім'я:</label>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Email:</label>
            <p class="text-gray-900">{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Роль:</label>
            <p class="text-gray-900">
                @switch($user->role)
                    @case(1)
                        Завідувач
                        @break
                    @case(2)
                        Адміністратор
                        @break
                    @case(3)
                        Лікар
                        @break
                    @case(4)
                        Медсестра
                        @break
                    @default
                        Невідомо
                @endswitch
            </p>
        </div>

        <div class="flex items-center space-x-4 mt-6">
            <a href="{{ route('admin.users.edit', $user) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                Редагувати
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="text-gray-600 hover:underline">
                Назад до списку
            </a>
        </div>
    </div>
@endsection
