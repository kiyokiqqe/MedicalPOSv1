@extends('layouts.app') 

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Перегляд пацієнта (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-xl bg-white p-6 rounded-lg shadow-md border border-gray-200 space-y-4">
            <p><strong>Ім'я:</strong> {{ $patient->name }}</p>
            <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
            <p><strong>Стать:</strong> {{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</p>
            <p><strong>Телефон:</strong> {{ $patient->phone }}</p>

            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('chief.patients.edit', $patient) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow transition">
                    ✏️ Редагувати
                </a>

                <form action="{{ route('chief.patients.destroy', $patient) }}" method="POST"
                      onsubmit="return confirm('Ви впевнені, що хочете видалити пацієнта?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow transition">
                        🗑️ Видалити
                    </button>
                </form>

                <a href="{{ route('chief.patients.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow transition">
                    ⬅ Назад
                </a>
            </div>
        </div>
    </div>
@endsection
