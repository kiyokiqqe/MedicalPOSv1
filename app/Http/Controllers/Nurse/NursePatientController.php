<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class NursePatientController extends Controller
{
    public function index()
    {
        // Показати список пацієнтів (можна обмежити, якщо потрібно)
        $patients = Patient::paginate(10);
        return view('nurse.patients.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        // Показати медичну картку пацієнта, якщо вона є
        $medicalCard = $patient->medicalCard;

        return view('nurse.patients.show', compact('patient', 'medicalCard'));
    }

    public function edit(Patient $patient)
    {
        abort(403, 'Редагування пацієнтів для медсестри заборонено.');
    }

    public function update(Request $request, Patient $patient)
    {
        abort(403, 'Оновлення пацієнтів для медсестри заборонено.');
    }
}   
