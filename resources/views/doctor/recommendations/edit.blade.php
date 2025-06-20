@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагувати рекомендацію') }}
    </h2>
@endsection

@section('content')
<div class="p-4 sm:px-6 lg:px-8">
    <form action="{{ route('doctor.recommendations.update', $recommendation->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="text" class="block text-gray-700 font-bold mb-2">Текст рекомендації:</label>
            <textarea name="text" id="text" rows="4" class="w-full border rounded p-2">{{ old('text', $recommendation->text) }}</textarea>
            @error('text')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">💾 Оновити</button>
        <a href="{{ url()->previous() }}" class="ml-2 text-gray-600 hover:underline">Скасувати</a>
    </form>
</div>
@endsection
