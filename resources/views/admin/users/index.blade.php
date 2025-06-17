@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Список користувачів (Адміністратор)') }}
    </h2>
@endsection

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            {{ __('Додати користувача') }}
        </a>

        <a href="{{ route('admin.dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            {{ __('Повернутися на дашборд') }}
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300 bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Ім'я</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Роль</th>
                    <th class="border border-gray-300 px-4 py-2">Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
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
                        </td>
                        <td class="border border-gray-300 px-4 py-2 space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:underline">Редагувати</a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Ви впевнені, що хочете видалити користувача?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            Користувачів не знайдено
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
