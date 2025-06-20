@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Створити користувача') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('chief.users.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Ім'я</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
                       required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
                       required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password"
                       class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
                       required>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Підтвердження пароля</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
                       required>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Роль</label>
                <select id="role" name="role"
                        class="form-select mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
                        required>
                    <option value="">Оберіть роль</option>
                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Завідувач</option>
                    <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Адміністратор</option>
                    <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Лікар</option>
                    <option value="4" {{ old('role') == '4' ? 'selected' : '' }}>Медсестра</option>
                    <option value="5" {{ old('role') == '5' ? 'selected' : '' }}>Фармацевт</option>
                    <option value="6" {{ old('role') == '6' ? 'selected' : '' }}>АдміністраторФарма</option>
                </select>
                @error('role')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-4">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
                    Створити
                </button>

                <a href="{{ route('chief.users.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow text-sm inline-block">
                    Скасувати
                </a>
            </div>
        </form>
    </div>
@endsection
