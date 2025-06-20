@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Медична картка пацієнта') }}
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <h3 class="text-lg font-semibold mb-4">{{ $medicalCard->patient->name }} ({{$medicalCard->patient->birth_date->format('d.m.Y')}})</h3>

    <div class="mb-4 bg-white p-4 rounded shadow">
        <strong>Загальні нотатки:</strong>
        <p>{{ $medicalCard->notes ?? '—' }}</p>
    </div>

    <div class="flex space-x-2 mb-4">
        <a href="{{ route('admin.medical_cards.edit', $medicalCard) }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Редагувати</a>
        <form action="{{ route('admin.medical_cards.destroy', $medicalCard) }}" method="POST"
              onsubmit="return confirm('Видалити медичну картку?')">
            @csrf @method('DELETE')
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Видалити</button>
        </form>
    </div>

    <a href="{{ route('admin.patients.show', $medicalCard->patient) }}"
       class="text-gray-600 hover:underline">← До пацієнта</a>
</div>
@endsection
