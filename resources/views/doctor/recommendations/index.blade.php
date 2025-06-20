@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Всі рекомендації
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded shadow-md">
        @if ($recommendations->isEmpty())
            <p class="text-gray-500">Рекомендацій поки немає.</p>
        @else
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2">Пацієнт</th>
                        <th class="py-2">Рекомендація</th>
                        <th class="py-2">Дата</th>
                        <th class="py-2">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recommendations as $rec)
                        <tr class="border-b">
                            <td class="py-2">{{ $rec->medicalCard->patient->name }}</td>
                            <td class="py-2">{{ Str::limit($rec->text, 50) }}</td>
                            <td class="py-2">{{ $rec->created_at->format('d.m.Y') }}</td>
                            <td class="py-2">
                                <a href="{{ route('doctor.recommendations.show', $rec->id) }}" class="text-blue-600 hover:underline">Переглянути</a>
                                <a href="{{ route('doctor.recommendations.edit', $rec->id) }}" class="ml-2 text-yellow-600 hover:underline">Редагувати</a>
                                <form action="{{ route('doctor.recommendations.destroy', $rec->id) }}" method="POST" class="inline-block"
      onsubmit="return confirm('Видалити рекомендацію?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline ml-2">Видалити</button>
</form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
