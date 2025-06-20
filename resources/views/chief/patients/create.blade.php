@extends('layouts.app') 

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Додати пацієнта (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <form action="{{ route('chief.patients.store') }}" method="POST"
              class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md border border-gray-200 space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Ім'я</label>
                <input type="text" name="name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                       required>
            </div>

            <div>
                <label class="block font-medium mb-1">Дата народження</label>
                <input type="date" name="birth_date"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                       required>
            </div>

            <div>
                <label class="block font-medium mb-1">Стать</label>
                <select name="gender"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        required>
                    <option value="male">Чоловік</option>
                    <option value="female">Жінка</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Телефон</label>
                <input type="text" name="phone"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>

            <div class="flex flex-wrap gap-3 mt-4">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow transition">
                    ➕ Додати
                </button>
                <a href="{{ route('chief.patients.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow transition">
                    ⬅ Скасувати
                </a>
            </div>
        </form>
    </div>
@endsection
