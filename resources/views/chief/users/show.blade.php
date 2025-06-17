@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Інформація про користувача') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-md border border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Деталі користувача</h3>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">ID:</span>
            <span class="text-gray-900">{{ $user->id }}</span>
        </div>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">Ім'я:</span>
            <span class="text-gray-900">{{ $user->name }}</span>
        </div>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="text-gray-900">{{ $user->email }}</span>
        </div>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">Роль:</span>
            <span class="text-gray-900">
                @if($user->role === 1) Завідувач
                @elseif($user->role === 2) Адміністратор
                @elseif($user->role === 3) Лікар/Фармацевт
                @elseif($user->role === 4) Медсестра/Медбрат
                @else Не визначено
                @endif
            </span>
        </div>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">Статус:</span>
            <span class="{{ $user->status ? 'text-green-600' : 'text-red-600' }}">
                {{ $user->status ? 'Активний' : 'Неактивний' }}
            </span>
        </div>

        <div class="mt-6">
            <a href="{{ route('chief.users.index') }}" 
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
               Повернутися до списку користувачів
            </a>
        </div>
    </div>
@endsection
