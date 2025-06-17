<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Вивести список пацієнтів
    public function index()
    {
        $patients = Patient::all();
        return view('chief.patients.index', compact('patients'));
    }

    // Показати форму створення пацієнта
    public function create()
    {
        return view('chief.patients.create');
    }

    // Зберегти нового пацієнта
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Patient::create($validated);

        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта створено');
    }

    // Показати деталі пацієнта
    public function show(Patient $patient)
    {
        return view('chief.patients.show', compact('patient'));
    }

    // Форма редагування пацієнта
    public function edit(Patient $patient)
    {
        return view('chief.patients.edit', compact('patient'));
    }

    // Оновити пацієнта
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $patient->update($validated);

        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта оновлено');
    }

    // Видалити пацієнта
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта видалено');
    }
}
