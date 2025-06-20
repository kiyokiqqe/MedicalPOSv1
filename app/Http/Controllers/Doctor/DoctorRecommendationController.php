<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalCard;
use App\Models\Recommendation;

class DoctorRecommendationController extends Controller
{
    public function index(MedicalCard $medicalCard)
    {
        $recommendations = $medicalCard->recommendations()->latest()->get();
        return view('doctor.recommendations.index', compact('recommendations', 'medicalCard'));
    }

    public function create(MedicalCard $medicalCard)
    {
        return view('doctor.recommendations.create', compact('medicalCard'));
    }

    public function store(Request $request, MedicalCard $medicalCard)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        $medicalCard->recommendations()->create([
            'text' => $request->text,
        ]);

        return redirect()->route('doctor.recommendations.index', $medicalCard)
            ->with('success', 'Рекомендація успішно створена.');
    }

    public function show(Recommendation $recommendation)
    {
        return view('doctor.recommendations.show', compact('recommendation'));
    }

    public function edit(Recommendation $recommendation)
    {
        return view('doctor.recommendations.edit', compact('recommendation'));
    }

    public function update(Request $request, Recommendation $recommendation)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        $recommendation->update([
            'text' => $request->text,
        ]);

        return redirect()->route('doctor.recommendations.index', $recommendation->medicalCard)
            ->with('success', 'Рекомендацію оновлено.');
    }

    public function destroy(Recommendation $recommendation)
    {
        $medicalCard = $recommendation->medicalCard;
        $recommendation->delete();

        return redirect()->route('doctor.recommendations.index', $medicalCard)
            ->with('success', 'Рекомендацію видалено.');
    }
}
