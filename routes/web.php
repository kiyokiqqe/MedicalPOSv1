<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RedirectController;

// Chief Controllers
use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Chief\ChiefPatientController;
use App\Http\Controllers\Chief\ChiefUserController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPatientController;

// Doctor Controllers
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientController;

// Nurse Controllers
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\Nurse\NursePatientController;

// Pharmacist Controllers
use App\Http\Controllers\Pharmacist\PharmacistDashboardController;
use App\Http\Controllers\Pharmacist\MedicationController as PharmacistMedicationController;

// AdminPharmacist Controllers
use App\Http\Controllers\AdminPharmacist\AdminPharmacistController;
use App\Http\Controllers\AdminPharmacist\MedicationController as AdminPharmacistMedicationController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('redirect.by.role');
    }
    return view('welcome');
})->name('welcome');

// Група для авторизованих користувачів
Route::middleware(['auth'])->group(function () {

    // Редірект після логіну за роллю
    Route::get('/redirect-by-role', [RedirectController::class, 'redirectByRole'])->name('redirect.by.role');

    /**
     * Завідувач (роль 1)
     */
    Route::prefix('chief')->name('chief.')
        ->middleware('role:1')
        ->group(function () {
            Route::get('/dashboard', [ChiefController::class, 'index'])->name('dashboard');
            Route::resource('patients', ChiefPatientController::class);
            Route::resource('users', ChiefUserController::class);
        });

    /**
     * Адміністратор (роль 2)
     */
    Route::prefix('admin')->name('admin.')
        ->middleware('role:2')
        ->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::resource('patients', AdminPatientController::class);
            Route::resource('users', AdminUserController::class);
        });

    /**
     * Лікар (роль 3)
     */
    Route::prefix('doctor')->name('doctor.')
        ->middleware('role:3')
        ->group(function () {
            Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
            Route::resource('patients', DoctorPatientController::class);
        });

    /**
     * Медсестра (роль 4)
     */
    Route::prefix('nurse')->name('nurse.')
        ->middleware('role:4')
        ->group(function () {
            Route::get('/dashboard', [NurseController::class, 'index'])->name('dashboard');
            Route::resource('patients', NursePatientController::class);
        });

    /**
     * Фармацевт (роль 5)
     */
    Route::prefix('pharmacist')->name('pharmacist.')
        ->middleware('role:5')
        ->group(function () {
            Route::get('/dashboard', [PharmacistDashboardController::class, 'index'])->name('dashboard');
            Route::get('medications', [PharmacistMedicationController::class, 'index'])->name('medications.index');
            Route::get('medications/{medication}', [PharmacistMedicationController::class, 'show'])->name('medications.show');
            Route::post('medications/{medication}/request', [PharmacistMedicationController::class, 'requestMedication'])->name('medications.request');
        });

    /**
     * Адмінфармацевт (роль 6)
     */
    Route::prefix('adminpharmacist')->name('adminpharmacist.')
        ->middleware('role:6')
        ->group(function () {
            Route::get('/dashboard', [AdminPharmacistController::class, 'index'])->name('dashboard');
            Route::resource('medications', AdminPharmacistMedicationController::class);
        });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
