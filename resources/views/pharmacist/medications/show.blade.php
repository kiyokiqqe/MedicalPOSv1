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

            <a href="{{ route('pharmacist.medications.index') }}" class="inline-block mt-4 text-gray-700 underline">
                ← Назад
            </a>
        </div>
    </div>
@endsection
