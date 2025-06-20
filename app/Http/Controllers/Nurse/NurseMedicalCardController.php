<?php



namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\MedicalCard;

class NurseMedicalCardController extends Controller
{
    public function show(Patient $patient)
    {
        $medicalCard = $patient->medicalCard()->with('recommendations')->first();

        if (!$medicalCard) {
            return back()->with('error', 'Медична картка не знайдена.');
        }

        return view('nurse.medical_cards.show', compact('medicalCard'));
    }
}
