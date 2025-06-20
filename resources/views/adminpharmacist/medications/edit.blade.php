@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагувати лікарський засіб') }}
    </h2>
@endsection

@section('content')
    <div class="p-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6 space-y-4">
            <form action="{{ route('adminpharmacist.medications.update', $medication) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium">Назва</label>
                        <input type="text" name="name" class="form-input w-full" value="{{ $medication->name }}" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Кількість</label>
                        <input type="number" name="quantity" class="form-input w-full" value="{{ $medication->quantity }}" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Код препарату</label>
                        <input type="text" name="code" class="form-input w-full" value="{{ $medication->code }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Дата прибуття</label>
                        <input type="date" name="arrival_date" class="form-input w-full" value="{{ $medication->arrival_date }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Дата придатності</label>
                        <input type="date" name="expiration_date" class="form-input w-full" value="{{ $medication->expiration_date }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Опис</label>
                        <textarea name="description" class="form-textarea w-full">{{ $medication->description }}</textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                        Оновити
                    </button>
                    <a href="{{ route('adminpharmacist.medications.index') }}"
                       class="ml-2 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                        Назад
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
