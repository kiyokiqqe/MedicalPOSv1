@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагувати користувача') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-gray-700 font-semibold">Ім'я</label>
            <input type="text" name="name" id="name" 
                   class="border rounded w-full px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   required
                   value="{{ old('name', $user->name) }}">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-gray-700 font-semibold">Email</label>
            <input type="email" name="email" id="email"
                   class="border rounded w-full px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   required
                   value="{{ old('email', $user->email) }}">
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="role" class="block text-gray-700 font-semibold">Роль</label>
            <select name="role" id="role"
                    class="border rounded w-full px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Завідувач</option>
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Адміністратор</option>
                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Лікар</option>
                <option value="4" {{ old('role', $user->role) == 4 ? 'selected' : '' }}>Медсестра</option>
            </select>
            @error('role') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                Оновити
            </button>

            <a href="{{ route('admin.users.index') }}"
               class="text-gray-600 hover:underline">
                Скасувати
            </a>
        </div>
    </form>
@endsection
