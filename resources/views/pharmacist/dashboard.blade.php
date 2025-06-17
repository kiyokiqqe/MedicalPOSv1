@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">Панель фармацевта</h2>
@endsection

@section('content')
    <div class="p-4">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Ласкаво просимо, фармацевт!</h3>
            <p class="text-gray-700">Оберіть дію з меню або перегляньте <a href="{{ route('pharmacist.medications.index') }}" class="text-blue-600 underline">лікарські засоби</a>.</p>
        </div>
    </div>
@endsection
