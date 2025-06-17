@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-semibold mb-6">Редагування користувача</h2>

    @php
        // Перевірка, чи це редагування самого себе і чи він завідувач
        $isEditingSelfChief = auth()->id() === $user->id && $user->role == 1;
    @endphp

    <form method="POST" action="{{ route('chief.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700 mb-1">Ім'я</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium text-gray-700 mb-1">Роль</label>
            <select id="role" name="role"
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('role') border-red-500 @enderror"
                    {{ $isEditingSelfChief ? 'disabled' : '' }}>
                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Завідувач</option>
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Адміністратор</option>
                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Лікар</option>
                <option value="4" {{ old('role', $user->role) == 4 ? 'selected' : '' }}>Медсестра</option>
            </select>
            @error('role')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($isEditingSelfChief)
                <!-- Приховане поле для відправки поточної ролі, оскільки select disabled не відправляє значення -->
                <input type="hidden" name="role" value="{{ $user->role }}">
            @endif
        </div>

        <!-- Якщо у тебе є поле статус, зроби аналогічно -->

        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded transition duration-300">
                Оновити
            </button>

            <a href="{{ route('chief.users.index') }}"
               class="text-blue-600 hover:underline ml-4 font-semibold">
               Назад
            </a>
        </div>
    </form>
</div>
@endsection
