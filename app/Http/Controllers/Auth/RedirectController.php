<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectByRole()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 1:
                return redirect()->route('chief.dashboard');
            case 2:
                return redirect()->route('admin.dashboard');
            case 3:
                return redirect()->route('doctor.dashboard');
            case 4:
                return redirect()->route('nurse.dashboard');
            case 5:
                return redirect()->route('pharmacist.medications.index');
            case 6:
                return redirect()->route('adminpharmacist.dashboard');
            default:
                Auth::logout();
                return redirect()->route('welcome')->with('error', 'Ваша роль не визначена або некоректна. Зверніться до адміністратора.');
        }
    }
}
