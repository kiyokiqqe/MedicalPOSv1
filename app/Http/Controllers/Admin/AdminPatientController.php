<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminPatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patients.create');
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

        return redirect()->route('admin.patients.index')->with('success', 'Пацієнта успішно додано.');
    }

    public function show(Patient $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
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

        return redirect()->route('admin.patients.index')->with('success', 'Пацієнта успішно оновлено.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('admin.patients.index')->with('success', 'Пацієнта успішно видалено.');
    }
}
