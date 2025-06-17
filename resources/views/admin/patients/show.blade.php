@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Деталі пацієнта') }}
    </h2>
@endsection

@section('content')
    <div class="space-y-2">
        <p><strong>ID:</strong> {{ $patient->id }}</p>
        <p><strong>Ім'я:</strong> {{ $patient->name }}</p>
        <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
        <p><strong>Стать:</strong> {{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</p>
        <p><strong>Телефон:</strong> {{ $patient->phone }}</p>
        <p><strong>Дата створення:</strong> {{ $patient->created_at->format('d.m.Y H:i') }}</p>
    </div>

    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.patients.edit', $patient) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Редагувати</a>
        <a href="{{ route('admin.patients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Назад</a>
    </div>
@endsection
