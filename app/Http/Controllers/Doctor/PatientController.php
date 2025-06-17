<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Показати всіх пацієнтів
        $patients = Patient::latest()->paginate(10);
        return view('doctor.patients.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        return view('doctor.patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('doctor.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
        ]);

        $patient->update($validated);

        return redirect()->route('doctor.patients.index')->with('success', 'Пацієнт оновлений');
    }
}
