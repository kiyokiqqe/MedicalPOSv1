@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Додати пацієнта') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('admin.patients.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block">Ім'я</label>
            <input type="text" name="name" id="name" class="border rounded w-full" required value="{{ old('name') }}">
        </div>

        <div>
            <label for="birth_date" class="block">Дата народження</label>
            <input type="date" name="birth_date" id="birth_date" class="border rounded w-full" required value="{{ old('birth_date') }}">
        </div>

        <div>
            <label for="gender" class="block">Стать</label>
            <select name="gender" id="gender" class="border rounded w-full" required>
                <option value="male">Чоловік</option>
                <option value="female">Жінка</option>
            </select>
        </div>

        <div>
            <label for="phone" class="block">Телефон</label>
            <input type="text" name="phone" id="phone" class="border rounded w-full" required value="{{ old('phone') }}">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Зберегти</button>
            <a href="{{ route('admin.patients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Скасувати
            </a>
        </div>
    </form>
@endsection
