<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;

class PharmacistDashboardController extends Controller
{
    public function index()
    {
        return view('pharmacist.dashboard');
    }
}
