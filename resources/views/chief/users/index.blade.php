@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Користувачі - Завідувач') }}
    </h2>
@endsection

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('chief.users.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            {{ __('Додати користувача') }}
        </a>

        <!-- Кнопка повернення на дашборд -->
        <a href="{{ route('chief.dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            {{ __('Повернутися на дашборд') }}
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4">{{ __("Список користувачів") }}</h3>

        @if($users->isEmpty())
            <p>{{ __("Користувачів поки що немає.") }}</p>
        @else
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Ім'я</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Роль</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($user->role) }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('chief.users.show', $user->id) }}" class="text-blue-600 hover:underline">Переглянути</a> |
                                <a href="{{ route('chief.users.edit', $user->id) }}" class="text-green-600 hover:underline">Редагувати</a> |
                                <form action="{{ route('chief.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Видалити користувача?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
