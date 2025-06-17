@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Перегляд пацієнта (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <div class="space-y-4">
        <p><strong>Ім'я:</strong> {{ $patient->name }}</p>
        <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
        <p><strong>Стать:</strong> {{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</p>
        <p><strong>Телефон:</strong> {{ $patient->phone }}</p>

        <div class="space-x-4">
            <a href="{{ route('chief.patients.edit', $patient) }}" class="text-yellow-600 hover:underline">Редагувати</a>

            <form action="{{ route('chief.patients.destroy', $patient) }}" method="POST" class="inline"
                  onsubmit="return confirm('Ви впевнені, що хочете видалити пацієнта?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Видалити</button>
            </form>

            <a href="{{ route('chief.patients.index') }}" 
               class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Скасувати
            </a>
        </div>
    </div>
@endsection
