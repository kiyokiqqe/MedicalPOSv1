@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Пацієнти (Медсестра)') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white p-6 rounded shadow-md max-w-5xl mx-auto">
        <div class="mb-6 flex justify-end">
            <a href="{{ route('nurse.dashboard') }}" 
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Назад на дашборд
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2">Ім'я</th>
                    <th class="border border-gray-300 p-2">Дата народження</th>
                    <th class="border border-gray-300 p-2">Стать</th>
                    <th class="border border-gray-300 p-2">Телефон</th>
                    <th class="border border-gray-300 p-2">Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $patient->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $patient->birth_date->format('d.m.Y') }}</td>
                        <td class="border border-gray-300 p-2">{{ $patient->gender == 'male' ? 'Чоловік' : 'Жінка' }}</td>
                        <td class="border border-gray-300 p-2">{{ $patient->phone }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ route('nurse.patients.show', $patient) }}" class="text-blue-600 hover:underline">Переглянути</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $patients->links() }}
        </div>
    </div>
@endsection
