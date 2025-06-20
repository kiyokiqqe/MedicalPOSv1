@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Лікарські засоби') }}
    </h2>
@endsection

@section('content')
<div class="py-4 px-6">
    {{-- Кнопка "Додати засіб" --}}
    <div class="mb-4">
        <a href="{{ route('adminpharmacist.medications.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
            + Додати засіб
        </a>
    </div>

    {{-- Заголовок та форма пошуку --}}
    <div class="bg-white p-4 rounded shadow mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Пошук</h3>

        <form method="GET" action="{{ route('adminpharmacist.medications.index') }}" class="flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700">Назва</label>
                <input type="text" name="name" value="{{ request('name') }}" class="form-input rounded border-gray-300 w-48" placeholder="Пошук за назвою">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Код</label>
                <input type="text" name="code" value="{{ request('code') }}" class="form-input rounded border-gray-300 w-48" placeholder="Код препарату">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Дата прибуття</label>
                <input type="date" name="arrival_date" value="{{ request('arrival_date') }}" class="form-input rounded border-gray-300 w-48">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Дата придатності</label>
                <input type="date" name="expiration_date" value="{{ request('expiration_date') }}" class="form-input rounded border-gray-300 w-48">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                    Пошук
                </button>
            </div>

            <div>
                <a href="{{ route('adminpharmacist.medications.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow inline-block text-center">
                    Очистити
                </a>
            </div>
        </form>
    </div>

    {{-- Повідомлення про успіх --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Таблиця лікарських засобів --}}
    <div class="overflow-x-auto bg-white shadow-md rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Назва</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Кількість</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Опис</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Код</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Дата прибуття</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Дата придатності</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Дії</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($medications as $medication)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $medication->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $medication->quantity }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $medication->description ?? '—' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $medication->code ?? '—' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">
                            {{ $medication->arrival_date ? \Carbon\Carbon::parse($medication->arrival_date)->format('d.m.Y') : '—' }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900">
                            {{ $medication->expiration_date ? \Carbon\Carbon::parse($medication->expiration_date)->format('d.m.Y') : '—' }}
                        </td>
                            <td class="px-4 py-2 text-sm text-gray-900 space-y-1"> 
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('adminpharmacist.medications.show', $medication) }}"
               class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm shadow">
                Переглянути
            </a>
            <a href="{{ route('adminpharmacist.medications.edit', $medication) }}" 
               class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-sm shadow">
                Редагувати
            </a>
            <form action="{{ route('adminpharmacist.medications.destroy', $medication) }}"
                  method="POST"
                  onsubmit="return confirm('Підтвердити видалення?')"
                  class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm shadow">
                    Видалити
                </button>
            </form>
        </div>
    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Немає записів</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
