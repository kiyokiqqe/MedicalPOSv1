@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Редагувати медичну картку</h2>

    <form action="{{ route('doctor.medical_cards.update', $medicalCard->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="notes" class="block text-gray-700 font-medium mb-2">Нотатки</label>
            <textarea id="notes" name="notes" rows="6"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                      required>{{ old('notes', $medicalCard->notes) }}</textarea>
            @error('notes')
                <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Оновити</button>

            <a href="{{ route('doctor.medical_cards.show', $medicalCard->id) }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Назад</a>
        </div>
    </form>
</div>
@endsection
