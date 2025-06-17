@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Деталі пацієнта (Лікар)') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white p-6 rounded shadow-md max-w-3xl mx-auto">
        <h3 class="text-lg font-bold mb-4">{{ $patient->name }}</h3>

        <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
        <p><strong>Стать:</strong> {{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</p>
        <p><strong>Телефон:</strong> {{ $patient->phone }}</p>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('doctor.patients.edit', $patient) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Редагувати</a>

            <a href="{{ route('doctor.patients.index') }}"
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Назад до списку</a>
        </div>
    </div>
@endsection
