@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагувати пацієнта') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('nurse.patients.update', $patient) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Ім'я</label>
            <input type="text" name="name" id="name" value="{{ old('name', $patient->name) }}" required
                   class="border rounded w-full px-3 py-2">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="birth_date" class="block font-medium text-sm text-gray-700">Дата народження</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $patient->birth_date->format('Y-m-d')) }}" required
                   class="border rounded w-full px-3 py-2">
            @error('birth_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="gender" class="block font-medium text-sm text-gray-700">Стать</label>
            <select name="gender" id="gender" required class="border rounded w-full px-3 py-2">
                <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Чоловік</option>
                <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Жінка</option>
            </select>
            @error('gender') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="phone" class="block font-medium text-sm text-gray-700">Телефон</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $patient->phone) }}" required
                   class="border rounded w-full px-3 py-2">
            @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Оновити</button>
        <a href="{{ route('nurse.patients.index') }}" class="ml-4 text-gray-600 hover:underline">Скасувати</a>
    </form>
@endsection
