@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Моя медична картка пацієнта') }}
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <h3 class="text-lg font-semibold mb-4">{{ $medicalCard->patient->name }}</h3>

    <div class="mb-4 bg-white p-4 rounded shadow">
        <strong>Мед-карта:</strong>
        <p>{{ $medicalCard->notes ?? '—' }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h4 class="font-semibold mb-2">Рекомендації:</h4>

        @if ($medicalCard->recommendations->isEmpty())
            <p class="text-gray-500">Рекомендацій ще немає.</p>
        @else
            <ul class="list-disc ml-5">
                @foreach ($medicalCard->recommendations as $rec)
                    <li class="mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <p>{{ $rec->text ?? $rec->content }}</p>
                                @if ($rec->is_done)
                                    <span class="text-green-600">(виконано {{ $rec->done_at->format('d.m.Y') }})</span>
                                @endif
                                <br>
                                <small class="text-gray-500">Створено: {{ $rec->created_at->format('d.m.Y H:i') }}</small>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('doctor.recommendations.edit', $rec->id) }}"
                                   class="text-blue-600 hover:underline text-sm">✏️ Редагувати</a>

                                <form action="{{ route('doctor.recommendations.destroy', $rec->id) }}"
                                      method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити цю рекомендацію?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">🗑️ Видалити</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="flex gap-4 mt-4">
            <a href="{{ route('doctor.recommendations.create', $medicalCard->id) }}"
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                ➕ Додати рекомендацію
            </a>

            <a href="{{ route('doctor.medical_cards.edit', $medicalCard->id) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                ✏️ Редагувати картку
            </a>
        </div>
    </div>

    <a href="{{ route('doctor.patients.show', $medicalCard->patient) }}"
       class="text-blue-600 hover:underline block mt-4">← До пацієнта</a>
</div>
@endsection
