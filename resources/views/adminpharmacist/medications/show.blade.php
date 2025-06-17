@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Інформація про лікарський засіб') }}
    </h2>
@endsection

@section('content')
    <div class="p-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6 space-y-4">
            <div>
                <span class="font-semibold text-gray-700">Назва:</span>
                <span class="text-gray-900">{{ $medication->name }}</span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">Кількість:</span>
                <span class="text-gray-900">{{ $medication->quantity }}</span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">Код препарату:</span>
                <span class="text-gray-900">{{ $medication->code ?? '—' }}</span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">Дата прибуття:</span>
                <span class="text-gray-900">
                    {{ $medication->arrival_date ? \Carbon\Carbon::parse($medication->arrival_date)->format('d.m.Y') : '—' }}
                </span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">Дата придатності:</span>
                <span class="text-gray-900">
                    {{ $medication->expiration_date ? \Carbon\Carbon::parse($medication->expiration_date)->format('d.m.Y') : '—' }}
                </span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">Опис:</span>
                <span class="text-gray-900">{{ $medication->description ?? '—' }}</span>
            </div>

            <div class="pt-4">
                <a href="{{ route('adminpharmacist.medications.index') }}"
                   class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    ← Назад до списку
                </a>
            </div>
        </div>
    </div>
@endsection
