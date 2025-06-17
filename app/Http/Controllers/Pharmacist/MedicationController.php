<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Models\Medication;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return view('pharmacist.medications.index', compact('medications'));
    }

    public function show(Medication $medication)
    {
        return view('pharmacist.medications.show', compact('medication'));
    }

    public function requestMedication(Medication $medication)
    {
        // Логіка запиту на видачу
        return back()->with('success', 'Запит на видачу ліків подано');
    }
}
