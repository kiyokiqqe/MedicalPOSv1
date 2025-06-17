<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;

class ChiefController extends Controller
{
    public function index()
    {
        return view('chief.dashboard');  // або інша твоя view
    }
}
