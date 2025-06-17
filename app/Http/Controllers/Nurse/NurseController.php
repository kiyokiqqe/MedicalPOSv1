<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;

class NurseController extends Controller
{
    public function index()
    {
        return view('nurse.dashboard'); // створюй відповідний blade-файл
    }
}
