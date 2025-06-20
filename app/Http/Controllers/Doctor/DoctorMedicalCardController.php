<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;
use Illuminate\Http\Request;

class DoctorMedicalCardController extends Controller
{
    public function show(MedicalCard $medicalCard)
    {
        $medicalCard->load(['patient', 'recommendations']);
        return view('doctor.medical_cards.show', compact('medicalCard'));
    }

    public function edit(MedicalCard $medicalCard)
    {
        return view('doctor.medical_cards.edit', compact('medicalCard'));
    }

    public function update(Request $request, MedicalCard $medicalCard)
    {
        $request->validate([
            'notes' => 'required|string|max:1000',
        ]);

        $medicalCard->update([
            'notes' => $request->notes,
        ]);

        return redirect()->route('doctor.medical_cards.show', $medicalCard)->with('success', 'Медична картка оновлена успішно.');
    }
}
