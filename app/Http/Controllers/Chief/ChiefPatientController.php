<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class ChiefPatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('chief.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('chief.patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender'     => 'required|in:male,female',
            'phone'      => 'nullable|string|max:20',
        ]);

        Patient::create($validated);

        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта додано.');
    }

    public function show(Patient $patient)
    {
        return view('chief.patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('chief.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender'     => 'required|in:male,female',
            'phone'      => 'nullable|string|max:20',
        ]);

        $patient->update($validated);

        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта оновлено.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('chief.patients.index')->with('success', 'Пацієнта видалено.');
    }
}
