@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Інформація про користувача') }}
    </h2>
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-800 mb-6">Деталі користувача</h3>

    <div class="space-y-4 text-sm text-gray-700">
        <div>
            <span class="font-medium">ID:</span>
            <span class="text-gray-900">{{ $user->id }}</span>
        </div>

        <div>
            <span class="font-medium">Ім'я:</span>
            <span class="text-gray-900">{{ $user->name }}</span>
        </div>

        <div>
            <span class="font-medium">Email:</span>
            <span class="text-gray-900">{{ $user->email }}</span>
        </div>

        <div>
            <span class="font-medium">Роль:</span>
            <span class="text-gray-900">
                @switch($user->role)
                    @case(1) Завідувач @break
                    @case(2) Адміністратор @break
                    @case(3) Лікар @break
                    @case(4) Медсестра/Медбрат @break
                    @case(5) Фармацевт @break
                    @case(6) АдміністраторФарма  @break
                    @default Не визначено
                @endswitch
            </span>
        </div>

        <div>
            <span class="font-medium">Статус:</span>
            <span class="{{ $user->status ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                {{ $user->status ? 'Активний' : 'Неактивний' }}
            </span>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('chief.users.index') }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm transition">
           ← Назад до списку
        </a>
    </div>
</div>
@endsection
