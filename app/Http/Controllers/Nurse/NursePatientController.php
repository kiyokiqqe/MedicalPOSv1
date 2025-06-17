<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class NursePatientController extends Controller
{
    public function index()
    {
        // Вибираємо пацієнтів, яких бачить медсестра
        $patients = Patient::paginate(10);
        return view('nurse.patients.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        // Перегляд деталей пацієнта
        return view('nurse.patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        // Форма редагування пацієнта
        return view('nurse.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
        ]);

        $patient->update($data);

        return redirect()->route('nurse.patients.index')
            ->with('success', 'Пацієнта успішно оновлено.');
    }

    // Медсестра не має права створювати або видаляти пацієнтів,
    // тому методи create, store, destroy можна не реалізовувати або захистити middleware.
}
