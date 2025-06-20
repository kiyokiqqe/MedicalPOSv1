@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагування медичної картки') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-xl mx-auto mt-4">
        <h3 class="text-lg font-semibold mb-4">Пацієнт: {{ $medicalCard->patient->name }}</h3>

        <form action="{{ route('admin.medical_cards.update', $medicalCard->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="notes" class="block text-sm font-medium text-gray-700">Нотатки</label>
                <textarea name="notes" id="notes" rows="5"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-blue-200">{{ old('notes', $medicalCard->notes) }}</textarea>
                @error('notes')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex space-x-2">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Оновити
                </button>
                <a href="{{ route('admin.medical_cards.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                    Назад
                </a>
            </div>
        </form>
    </div>
@endsection
