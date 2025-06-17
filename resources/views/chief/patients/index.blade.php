@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Список пацієнтів (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('chief.patients.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            {{ __('Додати пацієнта') }}
        </a>

        <!-- Кнопка повернення на дашборд -->
        <a href="{{ route('chief.dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            {{ __('Повернутися на дашборд') }}
        </a>
    </div>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Ім'я</th>
                <th class="border border-gray-300 px-4 py-2">Дата народження</th>
                <th class="border border-gray-300 px-4 py-2">Стать</th>
                <th class="border border-gray-300 px-4 py-2">Телефон</th>
                <th class="border border-gray-300 px-4 py-2">Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($patient->birth_date)->format('d.m.Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->gender === 'male' ? 'Чоловік' : 'Жінка' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="{{ route('chief.patients.show', $patient) }}" class="text-blue-600 hover:underline">Переглянути</a>
                        <a href="{{ route('chief.patients.edit', $patient) }}" class="text-yellow-600 hover:underline">Редагувати</a>
                        <form action="{{ route('chief.patients.destroy', $patient) }}" method="POST" class="inline"
                              onsubmit="return confirm('Ви впевнені, що хочете видалити пацієнта?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
