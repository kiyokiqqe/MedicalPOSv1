@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Рекомендація
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>Пацієнт:</strong> {{ $recommendation->medicalCard->patient->name }}</p>
        <p class="mt-2"><strong>Рекомендація:</strong></p>
        <p class="mb-2">{{ $recommendation->text }}</p>
        <p class="text-sm text-gray-500">Створено: {{ $recommendation->created_at->format('d.m.Y H:i') }}</p>

        <div class="mt-4">
            <a href="{{ route('doctor.recommendations.edit', $recommendation->id) }}"
               class="text-yellow-600 hover:underline">✏️ Редагувати</a>

               <form action="{{ route('doctor.recommendations.destroy', $recommendation->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Ви дійсно хочете видалити цю рекомендацію?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">🗑️ Видалити</button>
                </form>
               
            <a href="{{ route('doctor.medical_cards.show', $recommendation->medical_card_id) }}"
               class="ml-4 text-gray-600 hover:underline">← Назад до медичної картки</a>
        </div>
    </div>
</div>
@endsection
