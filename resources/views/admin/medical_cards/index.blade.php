@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Список медичних карток') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto mt-6">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Пацієнт</th>
                    <th class="px-4 py-2 border">Нотатки</th>
                    <th class="px-4 py-2 border">Оновлено</th>
                    <th class="px-4 py-2 border">Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cards as $card)
                    <tr>
                        <td class="px-4 py-2 border">{{ $card->id }}</td>
                        <td class="px-4 py-2 border">{{ $card->patient->name }}</td>
                        <td class="px-4 py-2 border">{{ \Illuminate\Support\Str::limit($card->notes, 50) }}</td>
                        <td class="px-4 py-2 border">{{ $card->updated_at->format('d.m.Y H:i') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.medical_cards.edit', $card->id) }}" class="text-blue-600 hover:underline">Редагувати</a>

                            <form action="{{ route('admin.medical_cards.destroy', $card->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Ви впевнені?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Немає записів</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $cards->links() }}
        </div>
    </div>
@endsection
