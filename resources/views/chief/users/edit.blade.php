@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редагування користувача') }}
    </h2>
@endsection

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    @php
        $isEditingSelfChief = auth()->id() === $user->id && $user->role == 1;
    @endphp

    <form method="POST" action="{{ route('chief.users.update', $user->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Ім'я</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                   class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="form-input mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Роль</label>
            <select id="role" name="role"
                    class="form-select mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200 @error('role') border-red-500 @enderror"
                    {{ $isEditingSelfChief ? 'disabled' : '' }}>
                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Завідувач</option>
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Адміністратор</option>
                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Лікар</option>
                <option value="4" {{ old('role', $user->role) == 4 ? 'selected' : '' }}>Медсестра</option>
                <option value="4" {{ old('role', $user->role) == 5 ? 'selected' : '' }}>Фармацевт</option>
                <option value="4" {{ old('role', $user->role) == 6 ? 'selected' : '' }}>АдміністраторФарма</option>
            </select>
            @error('role')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($isEditingSelfChief)
                <input type="hidden" name="role" value="{{ $user->role }}">
            @endif
        </div>

        <div class="flex items-center gap-3 pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                Оновити
            </button>

            <a href="{{ route('chief.users.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow text-sm inline-block">
                Назад
            </a>
        </div>
    </form>
</div>
@endsection
