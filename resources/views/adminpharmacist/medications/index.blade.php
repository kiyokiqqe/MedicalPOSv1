@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Лікарські засоби') }}
    </h2>
@endsection

@section('content')
    <div class="p-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('adminpharmacist.medications.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Додати засіб
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Назва</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Кількість</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Опис</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Код препарату</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Дата прибуття</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Дата придатності</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Дії</th>
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
                            <td class="px-4 py-2 text-sm text-gray-900 space-x-2">
                                <a href="{{ route('adminpharmacist.medications.show', $medication) }}"
                                   class="text-green-600 hover:text-green-800 underline">Переглянути</a>
                                <a href="{{ route('adminpharmacist.medications.edit', $medication) }}"
                                   class="text-blue-600 hover:text-blue-800 underline">Редагувати</a>
                                <form action="{{ route('adminpharmacist.medications.destroy', $medication) }}"
                                      method="POST"
                                      onsubmit="return confirm('Підтвердити видалення?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 underline">Видалити</button>
                                </form>
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
