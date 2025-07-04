<?php

namespace App\Http\Controllers\AdminPharmacist;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Medication::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('code')) {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        if ($request->filled('arrival_date')) {
            $query->whereDate('arrival_date', $request->arrival_date);
        }

        if ($request->filled('expiration_date')) {
            $query->whereDate('expiration_date', $request->expiration_date);
        }

        $medications = $query->orderByDesc('created_at')->get();

        return view('adminpharmacist.medications.index', compact('medications'));
    }

    public function create()
    {
        return view('adminpharmacist.medications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'code' => 'nullable|string|max:100',
            'arrival_date' => 'nullable|date',
            'expiration_date' => 'nullable|date|after_or_equal:arrival_date',
        ]);

        Medication::create($validated);

        return redirect()->route('adminpharmacist.medications.index')
                         ->with('success', 'Лікарський засіб успішно додано.');
    }

    public function show(Medication $medication)
    {
        return view('adminpharmacist.medications.show', compact('medication'));
    }

    public function edit(Medication $medication)
    {
        return view('adminpharmacist.medications.edit', compact('medication'));
    }

    public function update(Request $request, Medication $medication)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'code' => 'nullable|string|max:100',
            'arrival_date' => 'nullable|date',
            'expiration_date' => 'nullable|date|after_or_equal:arrival_date',
        ]);

        $medication->update($validated);

        return redirect()->route('adminpharmacist.medications.index')
                         ->with('success', 'Дані про засіб оновлено.');
    }

    public function destroy(Medication $medication)
    {
        $medication->delete();

        return redirect()->route('adminpharmacist.medications.index')
                         ->with('success', 'Засіб видалено.');
    }
}
