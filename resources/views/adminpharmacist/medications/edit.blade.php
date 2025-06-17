@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати лікарський засіб</h1>

    <form action="{{ route('adminpharmacist.medications.update', $medication) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Назва</label>
            <input type="text" name="name" class="form-control" value="{{ $medication->name }}" required>
        </div>

        <div class="mb-3">
            <label>Кількість</label>
            <input type="number" name="quantity" class="form-control" value="{{ $medication->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>Код препарату</label>
            <input type="text" name="code" class="form-control" value="{{ $medication->code }}">
        </div>

        <div class="mb-3">
            <label>Дата прибуття</label>
            <input type="date" name="arrival_date" class="form-control" value="{{ $medication->arrival_date }}">
        </div>

        <div class="mb-3">
            <label>Дата придатності</label>
            <input type="date" name="expiration_date" class="form-control" value="{{ $medication->expiration_date }}">
        </div>

        <div class="mb-3">
            <label>Опис</label>
            <textarea name="description" class="form-control">{{ $medication->description }}</textarea>
        </div>

        <button class="btn btn-primary">Оновити</button>
    </form>
</div>
@endsection
