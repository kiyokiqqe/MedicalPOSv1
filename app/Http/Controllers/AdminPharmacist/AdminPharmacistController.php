<?php

namespace App\Http\Controllers\AdminPharmacist;

use App\Http\Controllers\Controller;

class AdminPharmacistController extends Controller
{
    public function index()
    {
        return view('adminpharmacist.dashboard');
    }
}
