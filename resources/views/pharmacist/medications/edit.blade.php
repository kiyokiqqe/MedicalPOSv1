@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати засіб</h1>

    <form action="{{ route('pharmacist.medications.update', $medication->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Назва</label>
            <input type="text" name="name" value="{{ $medication->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Кількість</label>
            <input type="number" name="quantity" value="{{ $medication->quantity }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Опис</label>
            <textarea name="description" class="form-control">{{ $medication->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Оновити</button>
        <a href="{{ route('pharmacist.medications.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection
