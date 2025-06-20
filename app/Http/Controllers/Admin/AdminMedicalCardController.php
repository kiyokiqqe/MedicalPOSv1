<?php
// app/Http/Controllers/Admin/AdminMedicalCardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\MedicalCard;
use Illuminate\Http\Request;

class AdminMedicalCardController extends Controller
{
    public function index()
    {
        $cards = MedicalCard::with('patient')->paginate(10);
        return view('admin.medical_cards.index', compact('cards'));
    }

    public function create(Patient $patient)
    {
        return view('admin.medical_cards.create', compact('patient'));
    }

    public function store(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $patient->medicalCard()->create($validated);

        return redirect()->route('admin.patients.show', $patient)->with('success', 'Медична картка створена.');
    }

    public function edit(MedicalCard $medicalCard)
    {
        return view('admin.medical_cards.edit', compact('medicalCard'));
    }

    public function update(Request $request, MedicalCard $medicalCard)
    {
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $medicalCard->update($validated);

        return back()->with('success', 'Медична картка оновлена.');
    }

    public function destroy(MedicalCard $medicalCard)
    {
        $medicalCard->delete();

        return back()->with('success', 'Медична картка видалена.');
    }
}
