@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Перегляд пацієнта: {{ $patient->full_name }}
    </h2>
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-6">

    {{-- Назад --}}
    <div class="mb-4">
        <a href="{{ route('nurse.patients.index') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
            ← Назад до списку
        </a>
    </div>

    {{-- Дані пацієнта --}}
    <h3 class="text-lg font-semibold mb-4">Дані пацієнта</h3>

    <div class="space-y-2">
        <p><strong>ПІБ:</strong> {{ $patient->name }}</p>
        <p><strong>Дата народження:</strong> {{ $patient->date_of_birth }}</p>
        <p><strong>Стать:</strong> {{ $patient->gender }}</p>
        <p><strong>Контактний телефон:</strong> {{ $patient->phone }}</p>
        <p><strong>Адреса:</strong> {{ $patient->address }}</p>
    </div>

    {{-- Дії --}}
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('nurse.medical_cards.show', $patient->id) }}"
           class="bg-blue-200 hover:bg-blue-300 text-blue-900 px-4 py-2 rounded">
            📄 Медична картка
        </a>

        <!-- <a href="{{ route('nurse.patients.edit', $patient->id) }}"
           class="bg-yellow-200 hover:bg-yellow-300 text-yellow-900 px-4 py-2 rounded">
            ✏️ Редагувати
        </a> -->

                <!-- {{-- 
        <a href="{{ route('nurse.patients.requests_recommendations', $patient->id) }}"
           class="bg-indigo-200 hover:bg-indigo-300 text-indigo-900 px-4 py-2 rounded">
            📑 Заявки та рекомендації
        </a>
        --}} -->
    </div>
</div>
@endsection
