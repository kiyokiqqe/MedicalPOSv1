@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Список пацієнтів') }}
    </h2>
@endsection

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('admin.patients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ __('Додати пацієнта') }}
        </a>

        <!-- Кнопка повернення на дашборд -->
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            {{ __('Повернутися на дашборд') }}
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

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
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->birth_date->format('d.m.Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $patient->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="{{ route('admin.patients.show', $patient) }}" class="text-blue-500">Переглянути</a>
                        <a href="{{ route('admin.patients.edit', $patient) }}" class="text-yellow-500">Редагувати</a>
                        <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Ви впевнені?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $patients->links() }}
    </div>
@endsection
