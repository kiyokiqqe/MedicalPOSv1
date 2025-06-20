@extends('layouts.app') 

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Медична картка пацієнта') }}
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <h3 class="text-lg font-semibold mb-4">{{ $medicalCard->patient->name }}</h3>

    <div class="mb-4 bg-white p-4 rounded shadow">
        <strong>Нотатки:</strong>
        <p>{{ $medicalCard->notes ?? '—' }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h4 class="font-semibold mb-2">Рекомендації від лікаря:</h4>

        @if ($medicalCard->recommendations->isEmpty())
            <p class="text-gray-500">Рекомендацій поки немає.</p>
        @else
            <ul class="list-disc ml-5">
                @foreach ($medicalCard->recommendations as $rec)
                    <li class="mb-4">
                        <p class="font-medium">{{ $rec->text }}</p>
                        
                        @if ($rec->is_done)
                            <span class="text-green-600">(виконано {{ $rec->done_at->format('d.m.Y') }})</span>
                        @endif
                        <br>
                        <small class="text-gray-500">Створено: {{ $rec->created_at->format('d.m.Y H:i') }}</small>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ route('nurse.patients.show', $medicalCard->patient->id) }}"
       class="text-blue-600 hover:underline block mt-4">← Назад до пацієнта</a>
</div>
@endsection
