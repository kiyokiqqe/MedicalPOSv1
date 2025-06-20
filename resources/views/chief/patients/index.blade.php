@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Список пацієнтів (Завідувач)') }}
    </h2>
@endsection

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('chief.patients.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition">
            {{ __('➕ Додати пацієнта') }}
        </a>

        <a href="{{ route('chief.dashboard') }}"
           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
            {{ __('⬅ Повернутися на дашборд') }}
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-300 rounded-lg overflow-hidden text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Ім'я</th>
                    <th class="border px-4 py-2">Дата народження</th>
                    <th class="border px-4 py-2">Стать</th>
                    <th class="border px-4 py-2">Телефон</th>
                    <th class="border px-4 py-2 text-center">Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $patient->id }}</td>
                        <td class="border px-4 py-2">{{ $patient->name }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($patient->birth_date)->format('d.m.Y') }}</td>
                        <td class="border px-4 py-2">{{ $patient->gender === 'male' ? 'Чоловік' : 'Жінка' }}</td>
                        <td class="border px-4 py-2">{{ $patient->phone }}</td>
                        <td class="border px-4 py-2 text-center space-x-2">
    <a href="{{ route('chief.patients.show', $patient) }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded-lg shadow transition">
        Переглянути
    </a>
    <a href="{{ route('chief.patients.edit', $patient) }}"
       class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded-lg shadow transition">
        Редагувати
    </a>
    <form action="{{ route('chief.patients.destroy', $patient) }}" method="POST" class="inline"
          onsubmit="return confirm('Ви впевнені, що хочете видалити пацієнта?')">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded-lg shadow transition">
            Видалити
        </button>
    </form>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
