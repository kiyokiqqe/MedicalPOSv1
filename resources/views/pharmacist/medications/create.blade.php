@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">Деталі препарату</h2>
@endsection

@section('content')
    <div class="p-4">
        <div class="bg-white p-6 rounded shadow space-y-4">
            <div><strong>Назва:</strong> {{ $medication->name }}</div>
            <div><strong>Кількість:</strong> {{ $medication->quantity }}</div>
            <div><strong>Код препарату:</strong> {{ $medication->code ?? '—' }}</div>
            <div><strong>Дата прибуття:</strong> {{ $medication->arrival_date ?? '—' }}</div>
            <div><strong>Дата придатності:</strong> {{ $medication->expiration_date ?? '—' }}</div>
            <div><strong>Опис:</strong> {{ $medication->description ?? '—' }}</div>

            <form action="{{ route('pharmacist.medications.request', $medication) }}" method="POST">
                @csrf
                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                    Подати запит на видачу
                </button>
            </form>

            <a href="{{ route('pharmacist.medications.index') }}" class="inline-block mt-4 text-gray-700 underline">
                ← Назад
            </a>
        </div>
    </div>
@endsection
