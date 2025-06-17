@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Додати пацієнта (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('chief.patients.store') }}" method="POST" class="max-w-lg space-y-4">
        @csrf

        <div>
            <label class="block">Ім'я</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block">Дата народження</label>
            <input type="date" name="birth_date" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block">Стать</label>
            <select name="gender" class="w-full border rounded px-3 py-2" required>
                <option value="male">Чоловік</option>
                <option value="female">Жінка</option>
            </select>
        </div>

        <div>
            <label class="block">Телефон</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Додати
            </button>
            <a href="{{ route('chief.patients.index') }}" 
               class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Скасувати
            </a>
        </div>
    </form>
@endsection
