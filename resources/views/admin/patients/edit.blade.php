@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагувати пацієнта') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('admin.patients.update', $patient) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block">Ім'я</label>
            <input type="text" name="name" id="name" class="border rounded w-full" required value="{{ old('name', $patient->name) }}">
        </div>

        <div>
            <label for="birth_date" class="block">Дата народження</label>
            <input type="date" name="birth_date" id="birth_date" class="border rounded w-full" required value="{{ old('birth_date', $patient->birth_date->format('Y-m-d')) }}">
        </div>

        <div>
            <label for="gender" class="block">Стать</label>
            <select name="gender" id="gender" class="border rounded w-full" required>
                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Чоловік</option>
                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Жінка</option>
            </select>
        </div>

        <div>
            <label for="phone" class="block">Телефон</label>
            <input type="text" name="phone" id="phone" class="border rounded w-full" required value="{{ old('phone', $patient->phone) }}">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Оновити</button>
    </form>
@endsection
