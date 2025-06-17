@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати лікарський засіб</h1>

    <form action="{{ route('adminpharmacist.medications.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Назва</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Кількість</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Код препарату</label>
            <input type="text" name="code" class="form-control">
        </div>

        <div class="mb-3">
            <label>Дата прибуття</label>
            <input type="date" name="arrival_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Дата придатності</label>
            <input type="date" name="expiration_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Опис</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Зберегти</button>
    </form>
</div>
@endsection
