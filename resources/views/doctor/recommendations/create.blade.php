@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Додати рекомендацію
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded shadow-md">
        <form action="{{ route('doctor.recommendations.store', $medicalCard->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="text" class="block font-medium text-sm text-gray-700">Текст рекомендації</label>
                <textarea name="text" id="text" rows="4" required
                          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('text') }}</textarea>
                @error('text')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Зберегти</button>
            <a href="{{ route('doctor.medical_cards.show', $medicalCard->id) }}"
               class="ml-4 text-gray-600 hover:underline">← Назад</a>
        </form>
    </div>
</div>
@endsection
