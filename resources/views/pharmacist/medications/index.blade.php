@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">Лікарські засоби</h2>
@endsection

@section('content')
    <div class="p-4">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Назва</th>
                        <th class="px-4 py-2">Кількість</th>
                        <th class="px-4 py-2">Код</th>
                        <th class="px-4 py-2">Придатний до</th>
                        <th class="px-4 py-2">Дії</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($medications as $medication)
                        <tr>
                            <td class="px-4 py-2">{{ $medication->name }}</td>
                            <td class="px-4 py-2">{{ $medication->quantity }}</td>
                            <td class="px-4 py-2">{{ $medication->code ?? '—' }}</td>
                            <td class="px-4 py-2">
                                {{ $medication->expiration_date ? \Carbon\Carbon::parse($medication->expiration_date)->format('d.m.Y') : '—' }}
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('pharmacist.medications.show', $medication) }}" class="text-blue-600 hover:underline">Переглянути</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500">Немає записів</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
