@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Створити користувача (Адміністратор)') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Ім'я</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                       value="{{ old('email') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Роль</label>
                <select name="role" id="role"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                        required>
                    <option value="">Оберіть роль</option>
                    <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Завідувач</option>
                    <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Адміністратор</option>
                    <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>Лікар</option>
                    <option value="4" {{ old('role') == 4 ? 'selected' : '' }}>Медсестра</option>
                </select>
                @error('role') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Пароль</label>
                <input type="password" name="password" id="password"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Підтвердження пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                       required>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Створити
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="text-gray-600 hover:underline">
                    Скасувати
                </a>
            </div>
        </form>
    </div>
@endsection
